import requests

api_key = 'YOUR_API_KEY'  # Telegram Bot API anahtarınızı buraya ekleyin
chat_id = 'YOUR_CHAT_ID'  # Mesajı göndereceğiniz hedef chat ID'sini buraya ekleyin

username = 'kullanici'
password = 'sifre'

if username == 'kullanici' and password == 'sifre':
    text = "Başarılı giriş! Kullanıcı: " + username
else:
    text = "Kullanıcı adı veya şifre hatalı."

url = f'https://api.telegram.org/bot{api_key}/sendMessage?chat_id={chat_id}&text={text}'

response = requests.get(url)

if response.status_code == 200:
    print("Mesaj başarıyla gönderildi.")
else:
    print("Mesaj gönderme hatası.")
