# CampaignManager


A feladat egy kampánymenedzser leprogramozása, amely az alábbi feltételek alapján
képes kampányokat ki és bekapcsolni:

- A kampányoknak van kezdeti és végdátuma.
- A kampányokhoz tartozhatnak Termékek, Blog posztok és Kuponok.

A fenti entitásokra a következő szabályok vonatkoznak:

- Egy blog poszt nem publikálódhat hétvégén
- Egy termék publikálódhat bármelyik nap
- Egy kupon csak a hónap első 3 és utolsó 3 napján aktiválódhat
- Nem futhat két kampány egyidőben, ugyanazokra az elemekre
- A kampányok futtatásának feltétele, hogy jóváhagyott státuszban legyenek


A feladat megoldásához PHP 7+ használható. PHP package-k használata engedélyezett,
de nem kötelező.
A leprogramozott osztályok Unit Test-jeinek megléte plusz pontot jelent, de nem
kötelező.
