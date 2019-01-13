<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1>Home</h1>

    <ul class="js-list"></ul>

    <script type="text/javascript" src="/assets/js/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/contentful@latest/dist/contentful.browser.min.js"></script>
    <script src="/assets/js/contentful.js"></script>
    <script type="text/javascript">
        function convertToSlug(Text)
        {
            return Text
                .toLowerCase()
                .replace(/ /g,'-')
                .replace(/[^\w-]+/g,'');
        }

        contentfulClient.getEntries()
            .then(function (entries) {
                // log the title for all the entries that have it
                entries.items.forEach(function (entry) {
                    if(entry.fields.headline) {
                        console.log(entry)
                        $('.js-list').append( `<li><a href="/project/${convertToSlug(entry.fields.headline)}">${entry.fields.headline}</a></li>` )
                    }
                })
            });
    </script>
</body>
</html>