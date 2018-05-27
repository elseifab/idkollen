<div class="wrap">
    <h2>
        <?php echo $headline; ?>
    </h2>
    <p>
        <?php echo $body; ?>
    </p>

    <hr/>

    <h3>API</h3>

    <p>
        Autentiseringsadress: <code><?php echo $apiUrl; ?></code>
    </p>

    <hr/>

    <h3>Inställningsval</h3>

    <form action="?page=id-kollen-settings" method="post">

        <p>
            <label for="debugMode">
                <input type="checkbox" value="1" name="debug" <?php echo $debug ? 'checked="checked"' : ''; ?> />
                Debug läge (responderar med utökad info vid användning)
            </label>
        </p>

        <p>
            <label for="apiKey">
                API-nyckel från id-kollen:
            </label>
            <input type="text"
                   value="<?php echo $apiKey; ?>"
                   name="apiKey" />
        </p>

        <input name="save" type="submit" class="button-primary" value="Spara"/>

    </form>

</div>
