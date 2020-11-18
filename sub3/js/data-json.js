var xhr1 = new XMLHttpRequest();                 // XMLHttpRequest 객체를 생성한다.

xhr1.onload = function() {                       // When readystate changes
 
  //if(xhr1.status === 200) {                      // If server status was ok
    responseObject1 = JSON.parse(xhr1.responseText);  
    var newContent1 = '';

    for (var i = 0; i < responseObject1.show.length; i++) { 
      newContent1 += '<div>';
      newContent1 += '<img src="' + responseObject1.show[i].img + '" alt="뮤지컬포스터">';
      newContent1 += '<dl class="show_text">';
      newContent1 += '<dt>' + responseObject1.show[i].subject1 + '</dt>';
      newContent1 += '<dd><span>' + responseObject1.show[i].subject2 + '</span>' + responseObject1.show[i].text1 + '</dd>';
      newContent1 += '<dd><span>' + responseObject1.show[i].subject3 + '</span>' + responseObject1.show[i].text2 + '</dd>';
      newContent1 += '<dd><span>' + responseObject1.show[i].subject4 + '</span>' + responseObject1.show[i].text3 + '</dd>';
      newContent1 += '<dd><span>' + responseObject1.show[i].subject5 + '</span>' + responseObject1.show[i].text4 + '</dd>';
      newContent1 += '<dd><span>' + responseObject1.show[i].subject6 + '</span>' + responseObject1.show[i].text5 + '</dd>';
      newContent1 += '<dd><span>' + responseObject1.show[i].subject7 + '</span>' + responseObject1.show[i].text6 + '</dd>';
      newContent1 += '</dl>';
      newContent1 += '</div>';
    }
    document.getElementById('showBox').innerHTML = newContent1;
  //}
};

xhr1.open('GET', 'data/data.json', true);        // 요청을 준비한다.
xhr1.send(null);                                 // 요청을 전송한다

