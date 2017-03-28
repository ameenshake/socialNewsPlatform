const form = document.getElementsByTagName('form');
const required = document.getElementsByClassName('fat');

form[0].addEventListener('submit', function(event){
  const required = document.getElementsByClassName('fat');

  for (let i of required) {
    if (i.value === "") {
			i.className += " missing";
			event.preventDefault();
		}
  }

})

for (let i of required){
  i.addEventListener('keyup', function(event){
    i.classList.remove('missing');
  })
}
