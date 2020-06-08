var news = null;

function callBackend() {
    console.log("Hello");
    const request = new XMLHttpRequest();
    request.onload = () => {
        let responseObject;// = null;
        try {
            responseObject = JSON.parse(request.responseText);
        } catch(e) {
            console.error(e);
        }
        if(responseObject) {
            console.log("I received data from backend point");
            console.log(responseObject);

            news = responseObject;

            let ul = document.getElementsByClassName('news-list')[0];

            responseObject.forEach(function(entry) {

              let li = document.createElement("li");
              li.setAttribute('id', entry[0]);
              li.setAttribute("class", "news-list__item");
              li.innerHTML = entry[1] + "  " +  entry[2] + "  " + entry[3];

              let button = document.createElement("button");
              button.innerHTML = 'Show text';
              button.setAttribute('id', entry[0]);
              button.setAttribute("onClick", "showText(id)");
              li.append(button);
              ul.append(li);
            });

        }
    };

    request.open('GET', './News(L)-endpoint.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send();
}

callBackend();

function test() {
  console.log("Hello, diz is a test");
}

function showText(id) {
  console.log("I will show text for the news with given id : " + id);

  news.forEach(function(entry) {
    if(entry[0] == id) {
      console.log("I found it : " + entry[4] + " and has this id : " + entry[0]);
      let li = document.getElementById(id);
      let span = document.createElement("span");
      span.setAttribute("class", "span" + id);
      span.innerHTML = entry[4];

      let hideButton = document.createElement('button');
      hideButton.setAttribute("class", "span" + id);
      hideButton.setAttribute("value", "span" + id);
      hideButton.setAttribute("onClick", "hideText(this.value)");
      hideButton.innerHTML = "Hide";
      li.append(span);
      li.append(hideButton);
    }
  });

}

function hideText(givenClass) {
  console.log("I will hide element with this class : " + givenClass);
  let container = document.getElementsByClassName(givenClass);

  container[0].remove();
  container[0].remove();
}
