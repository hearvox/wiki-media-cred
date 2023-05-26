# Wiki Media Cred: Code
*[Future home of notes for Wiki Media Cred code]*

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

-----
*[Notes for later use…]*

WD list of properties: https://www.wikidata.org/wiki/Wikidata:List_of_properties

## Reclassify
* Make specific news-media outlets an `instance of` not `subclass of` (example below).
* Only one value in hierarchy needed, so if item has statements for `daily newspaper` and for `newspaper` we could remove the latter.
* Name unlabled news-media, using info for WP article or website.
* (Note: Unlabled and misclassified often the same, some are unsolvable: https://www.wikidata.org/wiki/Q31075044 )

Example: Was `subclass of` item `news agency`. 
Removed subclass added `instance of` for item
Tyumen Regional News Agency: https://www.wikidata.org/wiki/Q16708966

## Place
Use:
place of publication (P291): https://www.wikidata.org/wiki/Property:P291
street address (P6375): https://www.wikidata.org/wiki/Property:P6375
White House: https://www.wikidata.org/wiki/Q35525  
1600 Pennsylvania Avenue NW, Washington, DC 20500 (English)

US news media with a `street address`:
```SPARQL
SELECT DISTINCT ?item ?addr
WHERE {
  {?item wdt:P31/wdt:P279* wd:Q1193236 .}
  {?item wdt:P17|wdt:P495 wd:Q30 .}
  {?item wdt:P6375 ?addr .}
}
ORDER BY ASC(?itemLabel) LIMIT 40000
```
[Run it](https://query.wikidata.org/#SELECT%20DISTINCT%20%3Fitem%20%3Faddr%0AWHERE%20%7B%0A%20%20%7B%3Fitem%20wdt%3AP31%2Fwdt%3AP279%2a%20wd%3AQ1193236%20.%7D%0A%20%20%7B%3Fitem%20wdt%3AP17%7Cwdt%3AP495%20wd%3AQ30%20.%7D%0A%20%20%7B%3Fitem%20wdt%3AP6375%20%3Faddr%20.%7D%0A%7D%0AORDER%20BY%20ASC%28%3FitemLabel%29%20LIMIT%2040000%0A).

Other:
location (P276)
postal code (P281)

## Freq
daily newspaper (Q1110794): https://www.wikidata.org/wiki/Q1110794
semi-weekly newspaper (Q117038946)
weekly newspaper (Q2305295)
biweekly newspaper (Q106651350) - fortnight
weekly magazine (Q12340140)
monthly magazine (Q11780435)

publication interval (P2896): https://www.wikidata.org/wiki/Property:P2896
	day (Q573)
	week (Q23387)
	month (Q5151)
	fortnight (Q2993680)
	year (Q577)
item: frequency (Q104480093)





## Identfiers
*[Brief diff item and related property identifier.]*

Item: Media Bias/Fact Check ([`Q60741379`](https://www.wikidata.org/wiki/Q60741379))
[`Wikidata property`](https://www.wikidata.org/wiki/Property:P1687) (Data type: Item):
Media Bias/Fact Check ID ([`P9852`](https://www.wikidata.org/wiki/Property:P9852)), (Data type: External identifier)

[Help: Data type](https://www.wikidata.org/wiki/Help:Data_type)


## Data decisions
1. List news-outlet WD QIDs and labels.
2. Match news-outlet domain names with their QIDs.

### Matching and multiple domain-name
official website (P856)

