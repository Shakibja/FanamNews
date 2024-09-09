document.addEventListener('DOMContentLoaded', function () {
  const increaseFontSize = () => adjustFontSize(1);
  const decreaseFontSize = () => adjustFontSize(-1);
  const resetFontSize = () => setFontSize('.dNewsDesc > *', '18px');

  document
    .getElementById('btnIncrease')
    .addEventListener('click', increaseFontSize);
  document
    .getElementById('btnOriginal')
    .addEventListener('click', resetFontSize);
  document
    .getElementById('btnDecrease')
    .addEventListener('click', decreaseFontSize);

  const contentAdd = document.querySelector('.DContentAdd');
  const contentAdd2 = document.querySelector('.DContentAdd2');

  console.log(contentAdd2);
  const secondParagraph = document.querySelector(
    '#contentDetails p:nth-child(2)'
  );
  const fifthParagraph = document.querySelector(
    '#contentDetails p:nth-child(5)'
  );

  insertAfter(contentAdd, secondParagraph);
  insertAfter(contentAdd2, fifthParagraph);

  document.querySelectorAll('#contentDetails img').forEach(function (img) {
    const float = img.style.cssText.includes('float') ? img.style.cssText : '';
    const data = img.getAttribute('alt');
    const divCaption = createDivCaption(float);
    const paragraph = createParagraph(data, float);

    if (divCaption && paragraph) {
      img.parentNode.insertBefore(divCaption, img.nextSibling);
      divCaption.appendChild(img);
      divCaption.appendChild(paragraph);
    }
  });
});

function adjustFontSize(increment) {
  const elements = document.querySelectorAll('.dNewsDesc > *');
  elements.forEach(function (element) {
    const size =
      parseInt(window.getComputedStyle(element).fontSize) + increment;
    element.style.fontSize = size + 'px';
  });
}

function setFontSize(selector, size) {
  const elements = document.querySelectorAll(selector);
  elements.forEach(function (element) {
    element.style.fontSize = size;
  });
}

function insertAfter(newNode, referenceNode) {
  if (newNode && referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
  }
}

function createDivCaption(float) {
  const divCaption = document.createElement('div');
  divCaption.classList.add('dCaption');
  divCaption.style.cssText = float;
  return divCaption;
}

function createParagraph(data, float) {
  const paragraph = document.createElement('p');
  paragraph.classList.add('img-caption');
  if (data.length > 100) {
    paragraph.classList.add('text-justify');
  } else {
    paragraph.classList.add('text-center');
  }
  paragraph.textContent = data;
  return paragraph;
}
