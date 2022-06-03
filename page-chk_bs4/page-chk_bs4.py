from os import link
from urllib import request
from bs4 import BeautifulSoup

#初期化
def init(url):
    response = request.urlopen(url)
    soup = BeautifulSoup(response,"html.parser")
    response.close()
    return soup

def get_links(soup):
    links_tag = soup.find_all('img')   
    links = []
    for i in links_tag:
        link = i.get('src')

        links.append(link)
            
    return links

def test_pic(links):
    pics = []
    for i in links:
        print(i)
        pic = request.urlopen(i) 
        pics.append(pic)
    return pics


def run(url):
    soup = init (url)
    if soup!=None :
        print('Page Success!')
    img_links = get_links(soup)
    pics = test_pic(img_links)
    print(pics)


#Pages有効性チェック＋写真有効性チェック
#rangeはページ数。必要ない場合、run()のみ実行してください
for i in range(0,26):
    run ("URL"+ str(i) +"/")
    print('Pages i=' + str(i))
    print("\n")
