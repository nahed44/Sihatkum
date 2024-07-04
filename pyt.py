import base64
import psycopg2

def image_to_base64(image_path):
    with open(image_path, "rb") as image_file:
        encoded_string = base64.b64encode(image_file.read()).decode('utf-8')
    return encoded_string


image_path = "img\جهاز بخار.png"
base64_string = image_to_base64(image_path)


conn = psycopg2.connect(
    dbname='postgres', user='postgres',
    password='123456', host='localhost')
cursor = conn.cursor()


donationnumber = '17'


query = "UPDATE donation SET productimage = %s WHERE donationnumber = %s"


cursor.execute(query, (base64_string, donationnumber))


conn.commit()


cursor.close()
conn.close()