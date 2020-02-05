<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>WebEng 2019 - Routenplaner</title>
        <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="style.css">

        <script src="utils.js"></script>
        <script src="index.js"></script>
        <script>
            window.onload(initData());
        </script>
    </head>
    <body>
        <?php
            //initialize stop data
            require_once("classes/Getter.class.php");
            $a = new Getter();
            $stopsList = $a -> getStopList();
        ?>

        <header>
            <h1>Web Engineering Routenplaner</h1>
            <nav>
              <ul>
                  <li><a class="active" href="index.php">Home</a></li>
                  <li><a href="stops.php">Stops</a></li>
              </ul>
            </nav>
        </header>
        <main class="index-content">
            <aside>
                <h2 id="favname">Favorit: Haltestelle</h2>
                <ul id="favdepartures">
                    <li>16:03 Linie 5 (Wissenschaftsstadt)</li>
                    <li>16:10 Linie 3 (Wiblingen)</li>
                </ul>
            </aside>
            <section>
                <form class="search-form">
                    <input list="stops" class="stop-input" type="text" id="start" placeholder="Starthaltestelle eingeben"/>
                    <input list="stops" class="stop-input" type="text" id="end" placeholder="Endhaltestelle eingeben" />
                    <button type="button" class="stop-btn">➤</button>
                </form>
                <div id="result">
                </div>
            </section>

            <!--datalist for auto completion-->
            <datalist id="stops">
                <?php foreach($stopsList as $stop){?>
                <option value="<?=$stop?>"/>
                <?php } ?>
            </datalist>
        </main>
        <footer>
            Copyright WebEng 2019, Maybe rights are reserved
        </footer>
    </body>
</html>
