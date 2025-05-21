
from reportlab.pdfgen import canvas
from reportlab.lib.pagesizes import A4
import qrcode
import os


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
    SELECT f.id, c.nome, c.email, f.valor, f.vencimento
    FROM faturas f
    JOIN clientes c ON f.cliente_id = c.id
    WHERE f.status = 'pendente'
""")
faturas = cursor.fetchall()


os.makedirs("../pdfs", exist_ok=True)


for id_fatura, nome, email, valor, vencimento in faturas:
    nome_arquivo = f"../pdfs/fatura_{id_fatura}.pdf"
    pdf = canvas.Canvas(nome_arquivo, pagesize=A4)


    pdf.setFont("Helvetica", 14)
    pdf.drawString(100, 800, f"Fatura Nº {id_fatura}")
    pdf.drawString(100, 770, f"Cliente: {nome}")
    pdf.drawString(100, 740, f"E-mail: {email}")
    pdf.drawString(100, 710, f"Valor: R$ {valor:.2f}")
    pdf.drawString(100, 680, f"Vencimento: {vencimento.strftime('%d/%m/%Y')}")


    qr_data = f"Fatura {id_fatura} - Valor R$ {valor:.2f} - Vencimento: {vencimento}"
    qr = qrcode.make(qr_data)
    qr_path = f"../pdfs/qr_{id_fatura}.png"
    qr.save(qr_path)


    pdf.drawInlineImage(qr_path, 100, 500, 150, 150)

    pdf.save()
    os.remove(qr_path)

print("PDFs gerados com sucesso!")

cursor.close()
conn.close()
