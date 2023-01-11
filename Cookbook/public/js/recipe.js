const divs = document.querySelectorAll('.r-title');

divs.forEach(div => {
  const firstTwoLetters = div.textContent.slice(0, 2);
  div.innerHTML = `<span style="color:#FF9F0D !important;">${firstTwoLetters}</span>${div.textContent.slice(2)}`;
});
