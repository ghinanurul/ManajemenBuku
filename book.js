fetch('/api/books')
  .then(response => response.json())
  .then(data => {
    data.forEach(book => {
        console.log(book.title);
    });
  });
