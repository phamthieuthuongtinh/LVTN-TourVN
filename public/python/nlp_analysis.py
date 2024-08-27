from pyvi import ViTokenizer, ViPosTagger

import pymysql

def test_db_connection():
    try:
        conn = pymysql.connect(
            host="127.0.0.1",
            user="root",
            password="",
            database="tourvn"
        )
        cursor = conn.cursor()
        cursor.execute("SELECT DATABASE()")
        db = cursor.fetchone()
        print("Kết nối cơ sở dữ liệu thành công. Cơ sở dữ liệu hiện tại:", db[0])
        cursor.close()
        conn.close()
    except pymysql.MySQLError as e:
        print("Lỗi kết nối cơ sở dữ liệu:", e)

def get_tour_types():
    conn = pymysql.connect(
        host="127.0.0.1",
        user="root",
        password="",
        database="tourvn"
    )
    cursor = conn.cursor()
    cursor.execute("SELECT type_name FROM types WHERE status = 1")
    result = cursor.fetchall()
    cursor.close()
    conn.close()
    return [row[0] for row in result]




def analyze_preference(preference_sentence):
    # Lấy danh sách loại tour từ cơ sở dữ liệu
    types = get_tour_types()

    # Tokenize câu sở thích của khách hàng
    tokens = ViTokenizer.tokenize(preference_sentence)
    # print("Tokens:", tokens)

    # Gắn thẻ từ loại (POS tagging)
    pos_tags = ViPosTagger.postagging(tokens)
    # print("POS Tags:", pos_tags)

    # Tách các từ và từ loại từ kết quả POS tagging
    words = pos_tags[0]
    pos = pos_tags[1]

    # Lọc các danh từ và động từ
    keywords = [word for word, pos in zip(words, pos) if pos in ['V', 'N']]
    print("Từ khóa chính:", keywords)
   
    # Phân loại vào các loại tour
    type_tours = []
    for type_name in types:
        type_name_normalized = type_name.lower()
        # Loại bỏ dấu gạch dưới và thay thế bằng dấu cách
        type_name_normalized = type_name_normalized.replace('_', ' ')
        if any(keyword.replace('_', ' ').lower() in type_name_normalized for keyword in keywords):
            type_tours.append(type_name)
    return type_tours


# Sử dụng hàm để phân tích câu sở thích
# preference_sentence = "Khám phá các nét văn hóa nổi tiếng trên khắp thế giới"
preference_sentence = "tham quan nhiều nơi trên thế giới"
print(preference_sentence)
suggested_tours = analyze_preference(preference_sentence)
print("Các loại tour gợi ý:", suggested_tours)
