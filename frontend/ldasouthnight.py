from nltk.tokenize import RegexpTokenizer
from nltk.corpus import stopwords
from nltk.stem.porter import PorterStemmer
from gensim import corpora, models
import gensim
from file_name_for_python_southnight import *
tokenizer = RegexpTokenizer(r'\w+')



doc_set1 = []
with open(text) as f:
    for line in f:
        inner_list = [elt.strip() for elt in line.split('$')]
        # in alternative, if you need to use the file content as numbers
        # inner_list = [int(elt.strip()) for elt in line.split(',')]
        doc_set1.append(inner_list)

doc_set = []
for i in range(0,len(doc_set1)):
    doc_set.append(str(doc_set1[i])[2:-2])

#print(doc_set)

#with open("Output.txt", "w") as text_file:
#   text_file.write(format(doc_set))




# create English stop words list
en_stop = stopwords.words('english')

# Create p_stemmer of class PorterStemmer
p_stemmer = PorterStemmer()
    
# list for tokenized documents in loop
texts = []

# loop through document list
for i in doc_set:
    
    # clean and tokenize document string
    raw = i.lower()
    tokens = tokenizer.tokenize(raw)

    # remove stop words from tokens
    stopped_tokens = [i for i in tokens if not i in en_stop]
    
    # stem tokens
    stemmed_tokens = [p_stemmer.stem(i) for i in stopped_tokens]
    
    # add tokens to list
    texts.append(stemmed_tokens)

#print(texts)
# turn our tokenized documents into a id <-> term dictionary
dictionary = corpora.Dictionary(texts)
#print(dictionary.token2id)
    
# convert tokenized documents into a document-term matrix
corpus = [dictionary.doc2bow(text) for text in texts]
#print(corpus[0])

# generate LDA model
ldamodel = gensim.models.ldamodel.LdaModel(corpus, num_topics=1, id2word = dictionary, passes=50)
#print(ldamodel)

polkadots = (ldamodel.print_topics(num_topics=1, num_words=300))


#for i in range(0,len(polkadots)):
 #   print(polkadots[i][1]);
with open("Output_southnight.txt", "a") as text_file:
    text_file.write(format(polkadots))

  
