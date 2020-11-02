# 문제가 발생하거나 고민한 내용
    1.Kaggle 패키지 설치 중 pip command not found 오류 발생
      #sudo pip3 install pip –upgrade 이 명령어로 해결
      
    2.윈도우에서 vmware 우분투로 Kaggle.json 파일이동할 때 vmware tools가 설치가 안돼서
    우분투에 GUI를 설치하여 우분투에서 캐글에 접속해 직접 다운로드
      # apt-get install xinit
      # apt-get update
      # apt-get upgrade
      # apt-get install ubuntu-desktop
      # startx
      

# 참고할만한 내용
1. https://www.convertcsv.com/csv-to-sql.htm
이 사이트를 이용하면 csv파일을 테이블로 만들기 쉽다.
    
    2.csv파일 import하기 
    
    #load data local infile '/home/test/vgsales.csv' 
     into table vgsalesDB.vgsales fields terminated by ',';


# 회고
(+)
이왕 만드는거 재밌게 만들고 싶어서 샘플데이터를 사용하지 않고 캐글에서 데이터를 찾아서 사용했다.
이번 과제를 수행하면서 캐글 사용법이랑 csv파일을 import하는 방법을 알게 되어서 좋았다. 
처음엔 캐글 사용법이 낯설어서 많이 헤맸는데 결국엔 해결하고 완성 됐을 때 더 뿌듯했다.

(-)
캐글 패키지를 설치하면서 시간을 너무 많이 소비했는데 이럴거면 그냥 윈도우에 MySQL을 사용했어야했나 후회도 됐다.
하지만 어쨌든 완성했으니 됐다.
평가항목에 디자인은 없지만 그래도 디자인이 빠지니까 너무 허접해보였다... 

(!) 
과제가 생각보다 재밌었다. 특히 데이터를 불러오는것을 어떻게 해야하나 걱정만 앞섰었는데 막상해보니까 의외로 간단해서 재밌었다.
과제가 아니더라도 캐글에서 재밌는 데이터가 보이면 웹페이지를 만들어봐야겠다
(visual code로 코드를 깃허브에 업로드하다가 7주차 회고록이 날라가버린거 같은데 다시 만들어서 올리겠습니다..!)
