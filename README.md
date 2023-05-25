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
It was helpful to have all news media in Wikidata be discoverable under one category. Most were already labeled that: In Wiki-speak, the news-outlet had the property [`instance of`](https://www.wikidata.org/wiki/Property:P31), or a [`subclass of`](https://www.wikidata.org/wiki/Property:P279), the item [`news media`](https://www.wikidata.org/wiki/Q1193236)).
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

*[Briefly explain diff btwn instance and subclass.]* A few news-outlets were instance of items that should new-media subclasses but weren't (e.g., [`news program`](https://www.wikidata.org/wiki/Q1358344) and  [`news magazine`](https://www.wikidata.org/wiki/Q1684600). I brought them into the fold (i.e., made them a `news media` subclass, or subclass of a `news media` subclass.)

THe classification wrangling werem't something like this:
1. Get all news outlets under one general category: `news media`.
2. Get subclasses into logical categories (one or two levels down).
3. Change specific new-outlets improperly assigned `subclass` to 'instance of`.
4. Names for unlabled subclasses (one or two levels down), consulting the item's Wikipedia article or `official website`.

## Put publications in their place

-----
Example: https://www.wikidata.org/wiki/Q16708966 `subclass of` `news agency`

`newspaper` `daily newspaper`

A few are unsolvable: https://www.wikidata.org/wiki/Q87527714
https://www.wikidata.org/wiki/Q31075044

UNlableed and miscat ofte the same.

## Data decisions
The goal is to add data to news outlets in Wikdata (WD) which could help distinguish fact-based from fake news. That data comes from external databases. I;m using domain names to relate the data with the WD items. Tasks to do that are:
1. List news-outlet WD QIDs and labels.
1. Match news-outlet domain names with their QIDs.



### 2. Domain-name matches

## Wikidata entities

### Todo
* Add MBFC ratings (credibility, factual-reporting, maybe bias) to entities (2K) with MBFC Identifier IDs.
* Create entities for USA state press association, e.g, [Colorado Press Association](https://www.wikidata.org/wiki/Q5148862) (instance of: `correspondents' association` (<a href="https://www.wikidata.org/wiki/Q22679796">Q22679796</a>).
* Relate publication to their state (and national) press association to which they belong as instance of: `member` ([P463](https://www.wikidata.org/wiki/Property:P463)).

### Done
* Relate classes describing news-outlets to [`news media`](https://www.wikidata.org/wiki/Q1193236) (as subclass: [`news program`](https://www.wikidata.org/wiki/Q1358344),  [`news magazine`](https://www.wikidata.org/wiki/Q1684600)).
* Add [`place of publication`](https://www.wikidata.org/wiki/Property:P291) city to 300 news-outlets.
* Dissolved vs. discontinued. Check for references, add precision to data (day, month, or year).

### Docs
* Add updated URLs to items as values for the property: `official website` ([P856](https://www.wikidata.org/wiki/Property:P856)) property, with a [preferred rank](https://www.wikidata.org/wiki/Help:Ranking#Preferred_rank). But do not remove old URLs. Also, URLs should be unique: no other item should have the same official-website URL (property has a distinct-values constraint).
* Quick statements cannot set rank. Will try wikibase-cli.
* For different items with the same name, add statement for property: `different from` ([P1889](https://www.wikidata.org/wiki/Property:P18890)) with the qualifier: `applies to name of object` ([P8338](https://www.wikidata.org/wiki/Property:P8338)).
* Property for date estables: `inception` ([P571](https://www.wikidata.org/wiki/Property:P571)).

### Quick Statements
* Use [“Run in Background”](https://www.wikidata.org/wiki/Help:QuickStatements#Using_QuickStatements_version_2_in_batch_mode) mode (for most batches).
* Tool **cannot** add rank, try [wikibase-cli](https://github.com/maxlath/wikibase-cli) for `official website` URL.

## Wikidata:WikiProject Source Reliability
* Add Iffy Index of Unreliable Sources (JSON) to [WD:CRAP](https://www.wikidata.org/wiki/Wikidata:WikiProject_Source_Reliability) GitHub [source-reliability](https://github.com/the-interlace/source-reliability).
* Add Pink Slime (JSON) to WD:CRAP GitHub source-reliability.
* Property proposal: https://www.wikidata.org/wiki/Wikidata:Property_proposal/assessed_source_reliability 
* Schema: https://www.wikidata.org/wiki/Wikidata:WikiProject_Source_Reliability#Data_model

## API
* wikibase-cli: https://github.com/maxlath/wikibase-cli
* Wikidata Query Service: https://query.wikidata.org/
* Mix'n'Match (match datasets to Wikidata): https://mix-n-match.toolforge.org/#/import/

## DataViz
Using `news media` ([Q1193236](https://www.wikidata.org/wiki/Q1193236)) as seed:
* Wikidata Graph Builder: https://angryloki.github.io/wikidata-graph-builder/?item=Q1193236&property=P279&mode=reverse&sc_color=%231c5ec3c4&sc_width=5
* Wikidata generic tree: https://wikidata-todo.toolforge.org/tree.html?q=1193236&rp=279
* Reasonator ("Wikidata entries in a item-type-optimized fashion, and… related, significant data): https://reasonator.toolforge.org/?q=Q1193236
* SQID ("information about Wikidata classes and properties…  inspired by Magnus Manske's Reasonator): https://sqid.toolforge.org/#/view?id=Q1193236
* mataphacts ("demo system based on the open Wikidata knowledge graph"): https://wikidata.metaphacts.com/resource/wd:Q1193236
* WD News Media, sheet with `news media` subclass hierarchy: https://docs.google.com/spreadsheets/d/1oX4IYKHEsaCdkpv07ftcfYtKAtG6mRm5eYA5P-GIEMI/edit#gid=0)
* Template:Subclass list (with link to building query): https://m.wikidata.org/wiki/Template:Subclass_list

## Wikipedia articles
### Todo
*Coming*

### Done
*Nada*

*Wikimedia User: <a href="https://www.wikidata.org/wiki/Special:Contributions/Hearvox">Hearvox contributions</a>*
