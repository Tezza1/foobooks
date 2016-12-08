$('button').click(function() {

    // Get the book data from the hidden form
    var book = $('input[name=book]').val();

    // Convert the JSON string to a Object
    book = JSON.parse(book);

    // Demonstrate it works
    alert('Book title: ' + book['title']);

});
