## [CVI=04] "cv04" SYMFONY:
```
git clone git@gitlab.fit.cvut.cz:BI-TWA.1/B181/student-jencmart.git
cd student-jencmart
composer update
php bin/console server:run
```

* <del>Novy composer projekt se symfony </del> [OK]
    * <del>Ověřte, že se aplikace nainstalovala správně. (server:run) </del> [OK]
* <del>EmployeeController + akce listAction a detailAction</del> [OK] 
    * <del>Nastavte správné routování na jednotlivé akce a controller. </del> [OK]
    * <del>preferovaný způsob je pomocí anotací.</del> [OK]
    * <del>Nastavit routování správně v konfiguraci a případně u Controlleru samotného</del> [OK]
    * <del>Routování ověřte pomocí symfony konzole a příkazu debug:router</del> [OK]
* <del>Překopírujte databázi a šablony z minulého cvičení.</del> [OK]
    * <del>Upravte šablony, tak aby fungovali v rámci Symfony.</del> [OK] 
    * <del>Odkazy pomocí Twig funkce path(...), jméno akce najdete v debug:router nebo dle vaší definice.</del> [OK]
* <de>CSS soubory můžete nechat v public složce a odkazovat se na ně přímo (nejjednodušší varianta).</del> [OK]
    * <del>Nebo můžete nainstalovat a využít **assetic**, více informací v dokumentaci.</del> [OK]
    * <del>Or that state of the are **Webpack Encore** :-)</del> [OK]
## [CVI-03] "cv03" PHP:
* INSTALL & RUN
```
git clone git@gitlab.fit.cvut.cz:BI-TWA.1/B181/student-jencmart.git
cd student-jencmart
/usr/bin/php -S localhost:80 -t $PWD/web
```

* <del>Využijte nástroj Composer k integraci šablonovacího systému Twig.</del> [OK]
* <del>Upravte soubor composer.json</del> [OK]
* <del>Vytvořte soubor index.php, který bude sloužit jako front-end controller</del>. [OK] 
* <del>Vytvořte třídu Router, který bude sloužit jako jednoduchý routovač akcí.</del> [OK] 
* <del>Přepište statické stránky z minulého cvičení pro použití s šablonovacím systémem Twig.</del> [OK] 
* <del>Staticke tridy</del> [OK] 
* <del>Melo by jit prochazet staticke tridy</del> [OK]

## [CVI-02] "cv02" CSS:
* <del>Nastylujte pomocí CSS všechny stránky </del>
* <del>ideálně rozdělte vaše styly na obecné styly portálu (např. general.css) a v případě potřeby na jednotlivé styly stránek nebo sekcí.</del>
* <del>Použijte alespoň 1 selector obsahující</del>
    * <del>HTML tag</del> [OK]
    * <del>ID elementu</del> [OK]
    * <del>třídu elementu</del> [OK]
    * <del>přímého potomka</del> [OK]
    * <del>nepřímého potomka</del> [OK]
    * <del>[] složené závorky</del> [OK] 
    * <del>pseudo-třídu</del> [OK] 
    * <del>pseudo-element</del> [OK] 
* rozložení vhodné pro tisk. (+ uvedomit co je potreba vytistene na papire) [TODO]
* media queries [TODO]


## [CVI-01] "cv01" Vytvořte stránky minimálně pro:
* <del>hlavní stránku (pouze hlavička + vyhledávací formulář)</del> [OK]
* <del>přehled všech zaměstnanců (výsledek vyhledávání)</del> [OK]
    * <del>malá fotografie</del> [OK]
    * <del>jméno a příjmení</del> [OK]
    * <del>funkce</del> [OK]
    * <del>email</del> [OK]
    * <del>odkaz na detail a úpravu</del> [OK]
* <del>detail zaměstnance</del> [OK]
    * <del>fotografie zaměstnance</del> [OK]
    * <del>jméno a příjmení</del> [OK]
    * <del>funkce (může být více)</del> [OK]
    * <del>kontaktní údaje (telefon, email, webová stránka, ...)</del> [OK]
    * <del>textový popis</del>
* <del>editace zaměstnance</del> [OK]
    * <del>formulář pro editaci jednotlivých prvků na detailu</del> [OK]


# Projekt na cvičení:
* Cílem cvičení je vyzkoušet si technologie s pomocí frameworku Symfony 2 na reálném informačním systému "Evidence zaměstnanců". 
* Tento systém slouží podobně jako univerzitní systém UserMap pro evidenci zaměstnanců a jejich snadné vyhledávání.

## Domenovy model
![](misc/domain-model.png?raw=true)

## Uživatelské role
* R.1 Nepřihlášený uživatel
    * může prohlížet a vyhledávat v seznamu zaměstnanců
    * nemá přístup k fotografiím zaměstnanců
    * nevidí detail zaměstnanců
* R.2 Zaměstnanec
    * stejné jako *nepřihlášený uživatel* a navíc
    * má přístup k fotografiím a detailům zaměstnanců
    * může spravovat svůj profil
    * může spravovat své *dočasné* účty (pokud je přihlášen z permanentního účtu)
* R.3 Administrátor
    * má přístup ke všem zdrojům

## Funkční požadavky

#### F.1 Zaměstnanci [CRUD]
* F.1.1 Vložení zaměstnance
    * F.1.1.1 Vložení základní informací
    * F.1.1.2 Uložení fotografie na disk
* F.1.2 Seznam zaměstnanců (zobrazení)
    * F.1.2.1 Stránkování
    * F.1.2.2 Filtrování seznamu podle
    * F.1.2.2.1 jména
        * F.1.2.2.2 příjmení
        * F.1.2.2.3 funkce
        * F.1.2.2.4 kontaktních informací (telefonu, emailu, webové stránky, ...)
* F.1.2.3 Řazení zaměstnanců podle (jména, příjmení, ...)
* F.1.2.4 Zobrazení pouze aktivní zaměstnanců
    > * U funkce uživatele využít JS pro dynamické zobrazení seznamu dalších uživatelů se stejnou funkcí
* F.1.3 Detail zaměstnance (zobrazení)
    * F.1.3.1 Základní informace
        * F.1.3.1.1 Jméno a příjmení
        * F.1.3.1.2 Funkce (jedna nebo více)
        * F.1.3.1.3 Kontaktní informace (telefon, email, webová stránka, ...)
        * F.1.3.1.4 Popis zaměstnance
    * F.1.3.2 Fotografie
    * F.1.3.3 Seznam dočasných i permanentních účtů (pouze pro administrátora)
* F.1.4 Úprava zaměstnance
    > * Provádí administrátor nebo konkrétní uživatel. Dočasné účty může měnit pouze zaměstnanec přihlášený permanentním účtem. Permanentní účty pouze administrátor.
* F.1.5 Deaktivace zaměstnance
    * F.1.5.1 Reaktivace zaměstnance
    * F.1.5.2 Odstranění deaktivovaného zaměstnance
        * F.1.5.2.1 Odstranění fotografie
        * F.1.5.2.2 Odstranění přiřazených účtů
        * F.1.5.2.3 Odstranění přiřazených funkcí
 

#### F.2 Účty [CRUD]
* F.2.1 Vytvoření účtu pro zaměstnance
    > * Zaměstnanec může vytvořit pouze dočasný (s omezenou dobou platnosti), a to pouze pokud je přihlášen pod permanentním účtem.
* F.2.2 Seznam všech účtů
    > * Zobrazení detailů k účtům včetně jejich platnosti.
* F.2.3 Odstranění účtu
    > * Pokud je uživatel přihlášen pod trvalým účtem, pak může smazat libovolný dočasný účet.
 

#### F.3 Autentizace, autorizace a zabezpečení
* F.3.1 Přihlášení zaměstnance jedním z jeho účtů (jen pokud je aktivní)
* F.3.2 Zajištění správné autorizace na konkrétních stránkách
* F.3.3 Odhlášení zaměstnance
* F.3.4 Zabezpečení aplikace proti běžným útokům
