//= require common/libs/libs.min.js

$(document).ready(function () {
  /* Exports */

  function vacmap() {
      ymaps.ready(init);
  
      function init() {
          let myMap = new ymaps.Map("map", {
              center: [61.5240, 105.3188],
              zoom: 4
          });
  
          const params = new URLSearchParams(window.location.search);
          const partnerParam = params.get('partner') ? params.get('partner').trim().toLowerCase() : null;
          if (!partnerParam) {
              console.error("Параметр partner не передан");
              return;
          }
  
          fetch('https://opensheet.elk.sh/1qOxY18lprOZGtwxdiqp-Lr7GaBVef8g7Q7_pbpO_HFw/2')
              .then(function(response) {
                  return response.json();
              })
              .then(function(data) {
  
                  const partnerData = data.filter(function(item) {
                      return item.Партнер && item.Партнер.trim().toLowerCase() === partnerParam;
                  });
  
                  if (partnerData.length === 0) {
                      console.error("Для данного партнёра вакансии не найдены");
                      return;
                  }
  
                  const cities = new Set();
                  partnerData.forEach(function(item) {
                      if (item.Город) {
                          cities.add(item.Город.trim());
                      }
                  });
  
                  if (cities.size === 1) {
  
                      const firstCoords = partnerData[0].Координаты;
                      if (firstCoords) {
                          const coords = firstCoords.split(',').map(function(coord) {
                              return parseFloat(coord.trim());
                          });
                          myMap.setCenter(coords);
                          myMap.setZoom(10);
                      }
                  }
  
                  partnerData.forEach(function(item) {
                      if (item.Координаты) {
                          let coords = item.Координаты.split(',').map(function(coord) {
                              return parseFloat(coord.trim());
                          });
  
                          let label = item.Метка || 'Точка';
  
                          let placemark = new ymaps.Placemark(coords, {
                              iconContent: label,
                              hintContent: label
                          }, {
                              preset: 'islands#blackStretchyIcon'
                          });
  
                          placemark.events.add('click', function () {
                              myMap.setZoom(17, { duration: 300 });
                              myMap.panTo(coords, { duration: 300 });
                          });
  
                          myMap.geoObjects.add(placemark);
                      }
                  });
              })
              .catch(function(error) {
                  console.error("Ошибка получения данных с сервера:", error);
              });
      }
  }
  
  function loadVacancyFromQuery() {
      const crmButton = document.querySelector('#crm-button');
      const vacancyTitle = document.querySelector('.p-vacancy__main-title');
      const vacancyExperience = document.querySelector('#experience');
      const vacancyWorkSchedule = document.querySelector('#work-schedule');
      const vacancyPayment = document.querySelector('#payment');
      const vacancyEquipment = document.querySelector('#equipment');
      const vacancyInternship = document.querySelector('#internship');
      const vacancyScript = document.querySelector('#script');
      const params = new URLSearchParams(window.location.search);
      const name = params.get('name');
      const partner = params.get('partner');
  
      if (!name || !partner) {
          console.error("Не переданы необходимые параметры: name или partner");
          return;
      }
  
      fetch('https://opensheet.elk.sh/1qOxY18lprOZGtwxdiqp-Lr7GaBVef8g7Q7_pbpO_HFw/3')
          .then(response => {
              if (!response.ok) {
                  throw new Error("Ошибка при получении данных с сервера");
              }
              return response.json();
          })
          .then(data => {
  
              const vacancy = data.find(v => {
                  const vacancyName = v["Наименование вакансии"] ? v["Наименование вакансии"].trim().toLowerCase() : "";
                  const vacancyPartner = v["Партнер"] ? v["Партнер"].trim().toLowerCase() : "";
                  return vacancyName === name.trim().toLowerCase() && vacancyPartner === partner.trim().toLowerCase();
              });
  
              if (!vacancy) {
                  console.error("Вакансия не найдена");
                  return;
              }
  
              crmButton.href = vacancy["CRM"];
              vacancyTitle.innerHTML = vacancy["Наименование вакансии"];
              vacancyExperience.innerHTML = vacancy["Опыт работы"];
              vacancyWorkSchedule.innerHTML = vacancy["График"];
              vacancyPayment.innerHTML = vacancy["Оплата труда и оформление"];
              vacancyEquipment.innerHTML = vacancy["Оборудование"];
              vacancyInternship.innerHTML = vacancy["Стажировка и обучение"];
              vacancyScript.innerHTML = vacancy["Скрипт"];
          })
          .catch(error => {
              console.error("Ошибка запроса:", error);
          });
  }
  
  loadVacancyFromQuery();
  vacmap();
  
  
  
  

});