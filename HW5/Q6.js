document.getElementById('changeTextButton').addEventListener('click', function() {
    this.textContent = "Text Is Now Blue When You Click an Element!";
});

document.getElementById('colorChangeList').addEventListener('click', function() {
    var items = this.children;
    for (var i = 0; i < items.length; i++) {
        items[i].style.color = 'blue';
    }
});

document.getElementById('appendButton').addEventListener('click', function() {
    var para = document.createElement("p");
    para.textContent = "This is a new paragraph.";
    document.getElementById('appendDiv').appendChild(para);
});
