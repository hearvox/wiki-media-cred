# Wiki Media Cred: Data
*[Future home notes for Wiki Media Cred data]*

## Geo
Wikidata SPARQL query for US Cities: https://w.wiki/6fkS

WD US cities sheet: https://docs.google.com/spreadsheets/d/1gxJfhn1T0iI7wmVKnLx9r25a6p0axVFxZWYkR_qcIQg/edit#gid=163502263

Tables of US newspapers lists in Wikipedia by state: https://en.wikipedia.org/wiki/Category:Lists_of_newspapers_published_in_the_United_States_by_state

## Quick Statements
Example at add item for a state press assocation:
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
Explation of above quick statement batch:
1. Create a new item (in statements below, `LAST` holds the new item's QID). 
2. Add description (`Den`).
3. Add alias (`Aen`): domain name.
4. Add `instance of` (P31): `correspondents' association` (Q22679796).
5. Add `instance of`: `trade association` (Q2178147).
6. Add 'industry' (P452): `journalism` (Q11030).
7. Add `country` (P17): `United States of America` (Q30).
8. Add `located in the administrative territorial entity` (P131): state.
9. Add `headquarters location` (P159): city.
10. Add official website (P856), with `language of work or name` (P407): English (Q1860).
11. Add. ISNI (P213) number.
12. Add Library of Congress authority ID (P244).
13. Add VIAF ID (P214).
