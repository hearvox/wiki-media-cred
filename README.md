# Wiki Media Cred
*[drafting…]*  
Goal: Turn Wikimedia into a news-site credibility tool.

These are the resources and data diary for the <a href="https://misinfocon.com/turning-wikimedia-into-a-news-site-credibility-tool-422dbf28fdec">Wikicred/Iffy.news project</a>, adding news-site credibility indicators into Wikidata/Wikipedia.

The following workflow comes from trial and many errors in my attempts to:
* Locate news-media items in Wikidata (working with U.S. only).
* Add items for news media not in Wikidata (found in external datasets).
* Add and standardize Wikidata statements for news-media domain names (used to match Wikidata items with entries in external media databases).
* Add external-dataset info into Wikidata for news-media items, especally crediility indicaters (e.g., press-association membership, street address).

I gathered Wikidata items with the [Wikidata Query Service](https://query.wikidata.org/) (example search: [`United States` `news media`](https://w.wiki/6k32)), added data using [Quick Statements](https://quickstatements.toolforge.org/#/) (example update: [`place of publication`](https://quickstatements.toolforge.org/#/batch/128928)) and [wikibase-cli](https://github.com/maxlath/wikibase-cli), and merged Wikidata with external datasets mostly in [Google Sheets](https://docs.google.com/spreadsheets/d/1iriRBIkiE2dyhoT1ZWCVGcHhAWvdXZTA_1hBIF-_B5A/edit#gid=266534370), helped by the [Wikipedia and Wikidata Tools](https://workspace.google.com/marketplace/app/wikipedia_and_wikidata_tools/595109124715) sheets add-on.

After starting over several times, I remembered it's best to make each step replicable and reversable — to back out of any import mess I made. To do this, I usually added a column with a sortable flag, indicating the source of imported data — especialy useful for tracking where I found things like circulation estimates and domain names. As they (often don't) say in the tech world: Move slow and fix things.

## Coordinate categories
It was helpful to have all news media in Wikidata be discoverable under one category. Most were already labeled that: In Wiki-speak, the news-outlet had the property *instance of* ([`P31`](https://www.wikidata.org/wiki/Property:P31)), or a [`subclass of`](https://www.wikidata.org/wiki/Property:P279), the item [`news media`](https://www.wikidata.org/wiki/Q1193236)).
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

*(See network view in [Wikidata Graph Builder]([url](https://angryloki.github.io/wikidata-graph-builder/?item=Q1193236&property=P279&mode=reverse&sc_color=%231c5ec3c4&sc_width=5).)*

*[Brief diff btwn property and item, instance and subclass]* A few news-outlets were instance of items that should new-media subclasses but weren't (e.g., [`news program`](https://www.wikidata.org/wiki/Q1358344) and  [`news magazine`](https://www.wikidata.org/wiki/Q1684600). I brought them into the fold (i.e., made them a `news media` subclass, or subclass of a `news media` subclass.)

THe classification wrangling werem't something like this:
1. Get all news outlets under one general category: `news media`.
2. Get subclasses into logical categories (one or two levels down).
3. Change specific new-outlets improperly assigned `subclass` to 'instance of`.
4. Names for unlabled subclasses (one or two levels down), consulting the item's Wikipedia article or `official website`.

## Match domains

## Crowd-wisdom classes
*[Find out which properties WD folk use most often for news-media items. Then go with the wiki-crowd wisdom in deciding which property/class to use.]*

### Put publications in their place
*[The city was most often a `place of publication`, but sometimes was `headquarters location` (P159), `location` (P276), and/or `located in the administrative territorial entity` (P131). Done: Add `place of publication` to all news media. Todo: Add `street address` (P6375) (use format in prop's example: street, city, state, zip)]*

### Prepare for the End Times
*[The date a publicaton ceased was 90% in dissolved, abolished or demolished (`P576`) statements, with the rest as end time (`P582`). Done: Copy all dates in `end time` into `dissolved…` (with precision: day, month, or year).]*

### For members only
*[Membership in a press asscoiation was almost always `member of` ([P463](https://www.wikidata.org/wiki/Property:P463)) but a few times `affiliation` ([P1416](https://www.wikidata.org/wiki/Property:P1416)).]*





<!--
LABEL ([`Q`]((https://www.wikidata.org/wiki/Q))
*class* ([`Q`]((https://www.wikidata.org/wiki/Q))  
*property* ([`P`](https://www.wikidata.org/wiki/Property:P))

member of:
Institute for Nonprofit News (Q6060703)
Local Independent Online News (LION) Publishers (Q104172660)
example:
The Beacon
https://www.wikidata.org/wiki/Q104880644


https://statesnewsroom.com/newsrooms/

Inter American Press Association ([`Q1626261`](https://www.wikidata.org/wiki/Property:P463)) ([SPARQL](https://query.wikidata.org/#SELECT%20DISTINCT%20%3Fitem%20%3FitemLabel%20%3Fmember%20%3FmemberLabel%20%3Faffil%20%3FaffilLabel%0AWHERE%20%7B%0A%20%20%7B%3Fitem%20wdt%3AP1416%7Cwdt%3AP463%20wd%3AQ1626261%20.%7D%0A%20%20OPTIONAL%20%7B%3Fitem%20wdt%3AP463%20%3Fmember%20.%7D%0A%20%20OPTIONAL%20%7B%3Fitem%20wdt%3AP1416%20%3Faffil%20.%7D%0A%20%20SERVICE%20wikibase%3Alabel%20%7B%20bd%3AserviceParam%20wikibase%3Alanguage%20%22%5BAUTO_LANGUAGE%5D%2Cen%22.%20%7D%0A%7D%0AORDER%20BY%20ASC%28%3FitemLabel%29%20LIMIT%2040000))

*place of publication* ([`P291`](https://www.wikidata.org/wiki/Property:P291))
-->
