document.addEventListener('DOMContentLoaded', function() {
  var el = document.getElementById('itemList');
  var sortable = Sortable.create(el, {
      animation: 150,
      onEnd: function(evt) {
          var item = evt.item;
          var id = item.getAttribute('data-id');
          var newPosition = evt.newIndex + 1;
          
          htmx.ajax('POST', 'index.php', {
              target: '#itemList',
              swap: 'none',
              values: {
                  id: id,
                  newPosition: newPosition
              }
          });
      }
  });
});