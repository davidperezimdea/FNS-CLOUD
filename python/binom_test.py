#from scipy import stats
from time import time

def pval_adjust(pvalues, method):

    n = len(pvalues)
    if method == "none":

        return pvalues

    elif method == "bonferroni":

        return [pval*n for pval in pvalues]

    elif method == "BH":

        new_pvalues = [None for _ in range(n)]
        values = [ (pvalue, i) for i, pvalue in enumerate(pvalues) ]
        values.sort()
        values.reverse()
        new_values = []
        for i, vals in enumerate(values):
            rank = n - i
            pvalue, index = vals
            new_values.append((n/rank) * pvalue)
        for i in range(0, int(n)-1):
            if new_values[i] < new_values[i+1]:
                new_values[i+1] = new_values[i]
        for i, vals in enumerate(values):
            pvalue, index = vals
            new_pvalues[index] = new_values[i]
        return new_pvalues

    else:

        raise ValueError("method can only be 'None', 'bonferroni' or 'BH'")

def factorial(n):
    x = 1
    for i in range(1, n+1):
        x *= i
    return x

def combination(n, k):
    return factorial(n)/(factorial(k)*factorial(n-k))

def binompmf(k,n,p):
    return combination(n,k)*(p**k)*((1-p)**(n-k))

def binom_test(k,n,p, z_vals, p_vals):

    #pvalue approximation for large sample sizes using CLT
    #otherwise REALLY slow
    if n*p > 5 and n*(1-p) > 5:

        mu = p*n
        sigma = (p*n*(1-p))**0.5
        Z = ((k  - 0.5) - mu)/sigma

        z_vals_diff = [abs(z - Z) for z in z_vals]
        p_i = min(range(len(p_vals)), key = lambda k: z_vals_diff)
        p_val = p_vals[p_i]

    else:

        p_val = 0
        for i in range(k, n + 1):

            p_val += binompmf(i,n,p)

    return p_val

def read_file(fname):

    basic_stats = {}
    cp_classes = {}
    i = 0

    try:

        f = open('/home/u992250224/public_html/wp-content/themes/bento-child/python/'+fname, "r")

        for line in f:

            if i != 0:


                cp, classes = line[:-1].split("\t")
                classes = set(classes.split("|"))

                cp_classes[cp] = classes

                for c in classes:

                    if c.strip(): #avoid empty string classes
                        
                        if c in basic_stats:

                            basic_stats[c] += 1

                        else:

                            basic_stats[c] = 1
            i += 1

        for class_ in basic_stats:

            basic_stats[class_] = float(basic_stats[class_])/i #get probabilities

    finally:

        f.close()

    return basic_stats, cp_classes

def load_std():

    z_vals = []
    p_vals = []
    
    try:

        f = open("/home/u992250224/public_html/wp-content/themes/bento-child/python/std_sf.tsv")

        for line in f:

            z,p = line[:-1].split("\t")
            z = float(z)
            p = float(p)

            z_vals.append(z)
            p_vals.append(p)

    finally:

        f.close()

    return z_vals, p_vals

if __name__ == "__main__":

    import sys
    f = sys.argv[1]
    classification = sys.argv[2]
    pval_adjust_method = sys.argv[3]
    class_to_fname = {"drugbank": "cmap_to_DB_classification.tsv",
            "drugs.com": "cmap_to_drugs_com_classes.tsv",
            "CMAP":"cmap_to_moa_classification.tsv",
            "MESH":"cmap_to_MeSH_classification.tsv",
            "Kegg_phytochemicals": "cmap_to_KeGG_classification.tsv"}
    
    basic_stats, cp_classes = read_file(class_to_fname[classification])
    class_counts_pos = {}
    class_counts_neg = {}

    z_vals, p_vals = load_std()

    try:
    
        n_neighbors_pos = 0
        n_neighbors_neg = 0
        neighbors = open('/home/u992250224/public_html/wp-content/themes/bento-child/python/'+f, "r")

        for line in neighbors:

            neighbor, tau = line[:-1].split("\t")
            tau = float(tau)

            if neighbor in cp_classes:

                if tau > 0:

                    n_neighbors_pos += 1

                else:

                    n_neighbors_neg += 1
                
                for class_ in cp_classes[neighbor]:

                    if tau > 0:

                        if class_ in class_counts_pos:

                            class_counts_pos[class_] += 1

                        else:

                            class_counts_pos[class_] = 1

                    else:
                        
                        if class_ in class_counts_neg:

                            class_counts_neg[class_] += 1

                        else:

                            class_counts_neg[class_] = 1

        pvals_pos = []
        pvals_neg = []
        classes = list(basic_stats.keys())

        for class_ in classes:
            
            try:

                k = class_counts_pos[class_]
        
            except KeyError:

                k = 0
                
            p = basic_stats[class_]
            p_val = binom_test(k, n_neighbors_pos, p, z_vals, p_vals)
            pvals_pos.append(p_val) 

        for class_ in classes:
  
            try:

                k = class_counts_neg[class_]

            except KeyError:

                k = 0
                
            p = basic_stats[class_]
            p_val = binom_test(k, n_neighbors_neg, p, z_vals, p_vals)
            pvals_neg.append(p_val)

        pvals_pos = pval_adjust(pvals_pos, pval_adjust_method)
        pvals_neg = pval_adjust(pvals_neg, pval_adjust_method)
        result_fname = "enrichment_result_" + str(time()) + ".tsv"
        print(result_fname)
        try:

            f = open('/home/u992250224/public_html/wp-content/themes/bento-child/python/'+result_fname, "w+")
            f.write("class name" + "\t" + "pos_pval" + "\t" + "neg_pval"    + "\n")
            for i in range(len(classes)):

                class_ = classes[i]
                pval_pos = pvals_pos[i]
                pval_neg = pvals_neg[i]
                f.write(class_ + "\t" + str(pval_pos) + "\t" + str(pval_neg) + "\n")
        finally:

            f.close()


    finally:

        neighbors.close()
