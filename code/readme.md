# Wiki Media Cred: Code
*[Future home notes for Wiki Media Cred code]*

## Dataset
SPARQL query for the dataset used in Wiki Media Cred project:
* Finds items classified under news-media and in the United states (with a label in English).
* Joins entires in the [United States Newspaper Listing](https://www.usnpl.com/) and [Media Bias / Fact Check](https://mediabiasfactcheck.com/).
* Groups site and USNPL and website, which can have multiple values per item.
* Finds item's IDs for [AllSides]([url](https://www.allsides.com/)), [Muck Rack](https://muckrack.com/), if either exists.
* Finds value for [`place of publication`](https://www.wikidata.org/wiki/Property:P291) property, if one exists.
* Finds english Wikipedia article, if one exists.
```SPARQL
SELECT DISTINCT ?item ?itemLabel ?mbfc ?allsides ?muckrack ?article ?itemAltLabel ?itemDescription ?placeofpub ?placeofpubLabel
  (COUNT(?website) AS ?sites) 
  (GROUP_CONCAT(DISTINCT ?website; SEPARATOR=" | ") AS ?websites)
  (COUNT(?usnplsusnpl) AS ?usnpl) 
  (GROUP_CONCAT(DISTINCT ?usnpl; SEPARATOR=" | ") AS ?usnpls)
WHERE {
  {?item wdt:P31/wdt:P279* wd:Q1193236 .}
  {?item wdt:P17|wdt:P495 wd:Q30 .}
  UNION {?item wdt:P5454 ?usnpls.}
  UNION {?item wdt:P9852 ?mbfc.}
  OPTIONAL {?item wdt:P10006 ?allsides.}
  OPTIONAL {?item wdt:P9035 ?muckrack.}
  OPTIONAL {?item wdt:P291 ?placeofpub .} 
  OPTIONAL {?article schema:about ?item ; schema:isPartOf <https://en.wikipedia.org/>.}
  OPTIONAL {?item wdt:P856 ?website .}
  SERVICE wikibase:label { bd:serviceParam wikibase:language "[AUTO_LANGUAGE],en". }
  ?item rdfs:label ?itemLabel . FILTER(lang(?itemLabel) = 'en').
}
GROUP BY ?item ?itemLabel ?mbfc ?allsides ?muckrack ?article ?itemAltLabel ?itemDescription ?placeofpub ?placeofpubLabel
ORDER BY ASC(?itemLabel) LIMIT 40000
```
[Run it](https://w.wiki/6k32).

## Mermaid: mindmap
```mermaid
mindmap
	root((news media))
		id(news agency)
			news photo agency
			newswire
		id(newsletter)
			municipal newsletter
			night letter +1
			school newsletter
			stock exchange newsletter
			Wikimedia newsletter
		id(investigative journalism)	
		id(medical press)	
		id(news program)	
			current affairs shows
			flagship newscast
			television news magazine
			United States cable news
		id(news broadcasting)	
			children's broadcasted news
			current affairs
			election broadcast
			reporting television program
		id(news magazine)
		id(news media in the United States)
		id(news website)
			fake news website
			news aggregation website +2
			online newspaper
			sports news website
			television news website
			video game news website +1
		id(talk radio)
			conservative talk radio
			Internet talk radio
			Progressive talk radio
		id(press center)	
		id(written news media)
			Cooperative press
			Famille de presse
			newspaper +202
		id(women's press)
 ```
### References
GitHub: [Creating Diagrams](https://docs.github.com/en/get-started/writing-on-github/working-with-advanced-formatting/creating-diagrams) (see [Mermaid documentation](https://mermaid-js.github.io/mermaid/#/))
