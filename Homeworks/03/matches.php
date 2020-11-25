<?php include("top.php"); ?>

    <form action="matches-submit.php" method="get">

        <fieldset>
            <legend>Returning User:</legend>

            <ul>
                <li>
                    <strong>Name:</strong>
                    <input type="text" name="name" size="16"/>
                </li>
            </ul>

            <!--
            When the user presses "View My Matches," the form submits
            its data as a GET request to matches-submit.php. The
            name of the query parameter sent should be name, and its
            value should be the encoded text typed by the user. For
            example, when the user views matches for Rosie O Donnell,
            the URL should be:
            matches-submit.php?name=Rosie+O+Donnell
            -->
            <input type="submit" value="View My Matches"/>
        </fieldset>
    </form>

<?php include("bottom.php"); ?>