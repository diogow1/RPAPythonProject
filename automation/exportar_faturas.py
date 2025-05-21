import pymysql
from openpyxl import Workbook

conn = pymysql.connect(
    host="",
    user="",
    password="",
    database=""
)
cursor = conn.cursor()

cursor.execute("""
    SELECT c.nome, c.email, c.telefone,  f.valor, f.vencimento, f.status
    FROM faturas f
    JOIN clientes c ON f.cliente_id = c.id
""")
faturas = cursor.fetchall()

# Criar planilha
wb = Workbook()
ws = wb.active
ws.title = "Faturas"


ws.append(["nome", "email", "telefone", "valor", "vencimento", "status"])

for linha in faturas:
    ws.append(linha)

wb.save("../planilhas/faturas_exportadas.xlsx")
print("Planilha gerada com sucesso!")

cursor.close()
conn.close()
