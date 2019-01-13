const contentfulClient = contentful.createClient({
    space: 'j7bciyvbrwk4',
    accessToken: 'dbc9af1bc9c470cde0afd07206d8bc991347ff89d73662bb14c42429354ee4b6'
});

const getProject = (slug) => {
    contentfulClient.getEntries({
        'content_type': 'project',
        'fields.slug[in]': slug,
    })
        .then((response) => {
            const project = response.items[0];
            console.log( project );
            $('.js-headline').text(project.fields.headline);
            $('.js-description').text(project.fields.description);

            const imageElements = [];
            project.fields.pictures.forEach( ( asset ) => {
                console.log( 'asset', asset );
                imageElements.push( `<img src="${asset.fields.file.url}" alt="${asset.fields.title}"/>` );
            } );
            $('.js-images').append(imageElements);
        } )
        .catch(console.error)
}