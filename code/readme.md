Info on code files

## Mermaid: mindmap
```mermaid
mindmap
	root((news media))
		news agency	
			news photo agency
			newswire
		newsletter	
			municipal newsletter
			night letter +1
			school newsletter
			stock exchange newsletter
			Wikimedia newsletter
		investigative journalism	
		medical press	
		news program	
			current affairs shows
			flagship newscast
			television news magazine
			United States cable news
		news broadcasting	
			children's broadcasted news
			current affairs
			election broadcast
			reporting television program
		news magazine	
		news media in the United States	
		news website	
			fake news website
			news aggregation website +2
			online newspaper
			sports news website
			television news website
			video game news website +1
		talk radio	
			conservative talk radio
			Internet talk radio
			Progressive talk radio
		press center	
		written news media	
			Cooperative press
			Famille de presse
			newspaper +202
		women's press
 ```
## Dataset
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


https://w.wiki/6k32

```SQL
CREATE
LAST	Len	"Alabama Press Association"
LAST	Den	"Organization of newspapers in the U.S. state of Alabama"
LAST	Aen	"alabamapress.org"
LAST	P31	Q22679796
LAST	P31	Q2178147
LAST	P452	Q11030
LAST	P17	Q30
LAST	P131	Q173
LAST	P159	Q79867
LAST	P856	"https://www.alabamapress.org/"	P407	Q1860
LAST	P213	"0000 0000 9881 8572"
LAST	P244	"n80139199"
LAST	P214	"146583284"
```

## References 
GitHub: [Creating Diagrams](https://docs.github.com/en/get-started/writing-on-github/working-with-advanced-formatting/creating-diagrams) (see [Mermaid documentation](https://mermaid-js.github.io/mermaid/#/))
