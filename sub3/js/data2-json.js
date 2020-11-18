var xhr = new XMLHttpRequest();                 // XMLHttpRequest 객체를 생성한다.

xhr.onload = function() {                       // When readystate changes
 
  //if(xhr.status === 200) {                      // If server status was ok
    responseObject = JSON.parse(xhr.responseText);  //서버로 부터 전달된 json 데이터를 responseText 속성을 통해 가져올 수 있다.
	                                                 // parse() 메소드를 호출하여 자바스크립트 객체로 변환한다.

    var newContent = '';
      newContent += '<ul>';

    for (var i = 0; i < responseObject.list.length; i++) { 
      newContent += '<li>';
      newContent += '<img src="' + responseObject.list[i].img + '" alt="뮤지컬포스터">';
      newContent += '<dl>';
      newContent += '<dt>' + responseObject.list[i].title + '</dt>';
      newContent += '<dd>' + responseObject.list[i].day + '</dd>';
      newContent += '</dl>';
      newContent += '<span>';
      newContent += '<a href="sub3_1.html?a='+[i]+'">' + responseObject.list[i].book + '</a>';
      newContent += '<a href="#none">' + responseObject.list[i].info + '</a>';
      newContent += '</span>';
      newContent += '</li>';
    }
    newContent += '</ul>';
    document.getElementById('list').innerHTML = newContent;

  //}
};
xhr.open('GET', 'data/data2.json', true);        // 요청을 준비한다.
xhr.send(null);                                 // 요청을 전송한다
