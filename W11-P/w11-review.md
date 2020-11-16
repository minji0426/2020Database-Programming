# 1.새로 배운 내용
    statement: sql 쿼리 전달, 반드시 예외처리해야함
    트랜잭션: DB의 상태를 변환시키는 하나의 논리적 기능을 수행하기 위한 작업의 단위
    리팩토링: Connection, Statement, ResultSet 객체를 사용한 뒤 close() 메소드를 호출해서 자원을 반납하기
              반납하지 않으면 DB서버가 해당 SQL문의 결과를 계속 저장하고 있어야 하므로 메모리 낭비 발생


# 2.문제가 발생하거나 고민한 내용
    select * from ( select * from employees order by rownum desc ) where rownum = 1
    이 명령어가 자꾸 207 민준이를 추가했는데도 206윌리엄을 출력해줬다.
    슬랙 qna 게시판에 가보니 이미 같은 오류가 발생한 분이 계셔서 도움을 얻을 수 있었다.
    String sql = "select e.* from ( select a.* from employees a order by a.employee_id desc ) e where rownum = 1";
    이렇게 바꿔주니까 정상적으로 잘 나왔다.


# 3.참고할만한 내용
    슬랙 qna게시판을 참고했다.


# 4.회고
    (+) 저번달 정처기 시험에 리팩토링이 나왔었는데 그땐 답을 적지 못했었다. 
        정처기 문제는 틀렸지만 리팩토링에 대해 이번 수업에서 배울 수 있어서 다행이다.

    (-) 역시 자바가 들어가는 것들은 내 취향이 아닌것 같다...
        그래도 다음 강의에서 웹페이지를 만들면 재밌어질 것 같다.

    (!) 금방 끝날줄 알았는데 자잘한 오류가 생겨서 시간이 오래 걸렸다. 오타가 나지않게 조심해야겠다.
    
    
# 5.실행동영상

https://youtu.be/djuGXBr7B-w
