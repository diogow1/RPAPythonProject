from selenium import webdriver
from selenium.webdriver.common.by import By
from webdriver_manager.chrome import ChromeDriverManager
import time


driver = webdriver.Chrome()


driver.get("https://www.google.com")


time.sleep(5)


driver.quit()
