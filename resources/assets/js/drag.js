var dragAndDrop = {

limit: 4,
count: 0,

init: function () {
    this.dragula();
    this.eventListeners();
},

eventListeners: function () {
    this.dragula.on('drop', this.dropped.bind(this));
},

dragula: function () {
    this.dragula = dragula([document.querySelector('#left'), document.querySelector('#right')],
    {
        moves: this.canMove.bind(this),
        copy: true,
    });
},

canMove: function () {
    return this.count < this.limit;
},

dropped: function (el) {
    this.count++;
}

};

dragAndDrop.init();
