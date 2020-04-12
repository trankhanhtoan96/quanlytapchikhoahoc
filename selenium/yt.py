from time import sleep
import sys

from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

fp = webdriver.FirefoxProfile(sys.argv[1])
browser = webdriver.Firefox(firefox_profile=fp, executable_path='./geckodriver-macos')
browser.maximize_window()
browser.get(sys.argv[2])

el = WebDriverWait(browser, 30).until(EC.visibility_of_element_located((By.XPATH, '//button[@aria-label="Play"]')))
el.click()
sleep(int(sys.argv[3]))

wait = WebDriverWait(browser, 30)

if int(sys.argv[4]) == 1:
    el = wait.until(EC.visibility_of_element_located((By.XPATH, "/html/body/ytd-app/div/ytd-page-manager/ytd-watch-flexy/div[4]/div[1]/div/div[5]/div[2]/ytd-video-primary-info-renderer/div/div/div[3]/div/ytd-menu-renderer/div/ytd-toggle-button-renderer[1]/a/yt-icon-button/button/yt-icon")))
    el.click()
    sleep(5)

if int(sys.argv[5]) == 1:
    el = wait.until(EC.visibility_of_element_located((By.XPATH, '//*[@id="subscribe-button"]/ytd-subscribe-button-renderer/paper-button/yt-formatted-string')))
    el.click()
    sleep(5)

print('done')
browser.quit()
