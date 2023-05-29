# Wiki Media Cred
*[drafting…]*  
Goal: Turn Wikimedia into a news-site credibility tool.

These are the resources and data diary for the <a href="https://misinfocon.com/turning-wikimedia-into-a-news-site-credibility-tool-422dbf28fdec">Wikicred/Iffy.news project</a>, adding news-site credibility indicators, found in external databases, into Wikidata/Wikipedia. The datasets I had access to were mostly U.S. and English. Those with news-media data for other countries and languages may find this repo helpful.

The following workflow came from trial and many errors in my attempts to:
* Find news-media items in Wikidata.
* Create new items for news-media not in Wikidata.
* Match news-media items in Wikidata with their domain names (used to relate Wikidata items with their entries in external datasets).  
* Add data from external media datasets into Wikidata (e.g., crediility indicaters like press-association membership and street address).

Tools: I gathered Wikidata items with the [Wikidata Query Service](https://query.wikidata.org/) (example search: [`United States` `news media`](https://w.wiki/6k32)), added data using [Quick Statements](https://quickstatements.toolforge.org/#/) (example update: [`place of publication`](https://quickstatements.toolforge.org/#/batch/128928)) and [wikibase-cli](https://github.com/maxlath/wikibase-cli), and merged Wikidata with external datasets mostly in [Google Sheets](https://docs.google.com/spreadsheets/d/1iriRBIkiE2dyhoT1ZWCVGcHhAWvdXZTA_1hBIF-_B5A/edit#gid=266534370), helped by the [Wikipedia and Wikidata Tools](https://workspace.google.com/marketplace/app/wikipedia_and_wikidata_tools/595109124715) sheets add-on.

After starting over several times, I remembered my betters had taught me to make each step replicable and reversable — so I could back out of any import mess I made. To do this, I usually added a column with a sortable flag, indicating the source of imported data — especialy useful for tracking where I found things like circulation estimates and domain names. As they (often don't) say in the tech world: Move slow and fix things.

## Think like Wikidata
Wikidata stores stuctured data used in Wikipedia and other Wikimedia projects. It's a collection of pages for [Items](https://www.wikidata.org/wiki/Help:Items), "all the *things* in human knowledge, including topics, concepts, and objects." One item is [The Denver Post (Q2668654)](https://www.wikidata.org/wiki/Q2668654). It has a label (its name), a unique QID (Q + a number), a short description ("daily newspaper in Denver, Colorado"), aliases (alternative names: "Denver Post | denverpost.com"), followed by a list of [Statements](https://www.wikidata.org/wiki/Q2668654#claims) about the item.  

[Statements](https://www.wikidata.org/wiki/Help:Statements) describe the item by using a [Property](https://www.wikidata.org/wiki/Help:Properties) (P + a number) and its [Value](https://www.wikidata.org/wiki/Help:Statements#Values): The Denver Post is an [instance of (P31)](https://www.wikidata.org/wiki/Property:P31) a
[daily newspaper (Q1110794)](https://www.wikidata.org/wiki/Q1110794). Its [inception (P571)](https://www.wikidata.org/wiki/Property:P571) date was 1894. Its [official website (P856)](https://www.wikidata.org/wiki/Property:P856) is https://www.denverpost.com/.

A property takes a specified data type as a value. The *instance of* property's data type is *Item*. For *inception*, it's *Point in time*. For *official website*, it's *URL*.

Some items another list under the header [Identifiers](https://www.wikidata.org/wiki/Q2668654#identifiers), which are properties with the data type of *External identifier*, like [International Standard Serial Number (P236)](https://www.wikidata.org/wiki/Property:P236) and [Facebook ID (P2013)](https://www.wikidata.org/wiki/Property:P2013).

Some items are a class of things, which can classified into a hierarchy: The [daily newspaper (Q1110794)](https://www.wikidata.org/wiki/Q1110794) item is a [subclass of (P279)](https://www.wikidata.org/wiki/Property:P279) the [newspaper (Q11032)](https://www.wikidata.org/wiki/Q11032) item, which is a subclass of [news media (Q1193236)], a subclass of [mass media (Q11033)](https://www.wikidata.org/wiki/Q11033), a subclass of [media (Q340169)](https://www.wikidata.org/wiki/Q340169).

## Coordinate categories
For this project, it was convenient to have all news media in Wikidata be discoverable by one search: items that instance of, or instance of a subclass of, [news media](https://www.wikidata.org/wiki/Q1193236)). Most already were. I corrected a few outliers so those were too (e.g., made [`news program`](https://www.wikidata.org/wiki/Q1358344) and  [`news magazine`](https://www.wikidata.org/wiki/Q1684600) subclasses of news media).
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

*(See network chart in [Wikidata Graph Builder](https://angryloki.github.io/wikidata-graph-builder/?item=Q1193236&property=P279&mode=reverse&sc_color=%231c5ec3c4&sc_width=5).)*

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
