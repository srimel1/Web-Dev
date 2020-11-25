const cards = [{
  'name': '1',
  'img': 'images/1.png'
}, {
  'name': '2',
  'img': 'images/2.png'
}, {
  'name': '3',
  'img': 'images/3.png'
}, {
  'name': '4',
  'img': 'images/4.png'
}, {
  'name': '5',
  'img': 'images/5.png'
}, {
  'name': '6',
  'img': 'images/6.png'
}, {
  'name': '7',
  'img': 'images/7.png'
}, {
  'name': '8',
  'img': 'images/8.png'
}, {
  'name': '9',
  'img': 'images/9.png'
}, {
  'name': '0',
  'img': 'images/0.png'
}, {
  'name': '11',
  'img': 'images/11.png'},
  {'name': '12', 'img': 'images/12.png'}];

var memoryGrid = cards.concat(cards).sort(function () {
  return 0.5 - Math.random();
});


var wait = 1200;
var count = 0;
var prev = null;
var guess1 = '';
var guess2 = '';



var grid = document.createElement('section');
var game = document.getElementById('game');

grid.setAttribute('class', 'grid');
game.appendChild(grid);

memoryGrid.forEach(function (item) {
  var name = item.name,
      img = item.img;


  var card = document.createElement('div');
  card.classList.add('card');
  card.dataset.name = name;

  var back = document.createElement('div');
  back.classList.add('back');
  back.style.backgroundImage = 'url(' + img + ')';
  
  var front = document.createElement('div');
  front.classList.add('front');


  grid.appendChild(card);
  card.appendChild(front);
  card.appendChild(back);
});


var reset = function reset() {
  guess1 = '';
  guess2 = '';
  count = 0;
  prev = null;

  var selected = document.querySelectorAll('.selected');
  selected.forEach(function (card) {
    card.classList.remove('selected');
  });
};

var match = function match() {
  var selected = document.querySelectorAll('.selected');
  selected.forEach(function (card) {
    card.classList.add('match');
  });
};



grid.addEventListener('click', function (event) {

  var clicked = event.target;

  if (clicked.nodeName === 'SECTION' || clicked === prev || clicked.parentNode.classList.contains('selected') || clicked.parentNode.classList.contains('match')) {
    return;
  }

  if (count <=1 ) {
    count++;
    if (count === 1) {
      guess1 = clicked.parentNode.dataset.name;
      console.log(guess1);
      clicked.parentNode.classList.add('selected');
    } else {
      guess2 = clicked.parentNode.dataset.name;
      console.log(guess2);
      clicked.parentNode.classList.add('selected');
    }

    if (guess1 && guess2) {
      if (guess1 === guess2) {
        setTimeout(match, wait);
      }
      setTimeout(reset, wait);
    }
    prev = clicked;
  }
});
