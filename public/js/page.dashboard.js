(window.webpackJsonp=window.webpackJsonp||[]).push([[15],{18:function(t,a,e){t.exports=e("U19H")},U19H:function(t,a,e){(function(t){function a(t,a){var s;if("undefined"==typeof Symbol||null==t[Symbol.iterator]){if(Array.isArray(t)||(s=function(t,a){if(!t)return;if("string"==typeof t)return e(t,a);var s=Object.prototype.toString.call(t).slice(8,-1);"Object"===s&&t.constructor&&(s=t.constructor.name);if("Map"===s||"Set"===s)return Array.from(t);if("Arguments"===s||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(s))return e(t,a)}(t))||a&&t&&"number"==typeof t.length){s&&(t=s);var r=0,o=function(){};return{s:o,n:function(){return r>=t.length?{done:!0}:{done:!1,value:t[r++]}},e:function(t){throw t},f:o}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var n,l=!0,i=!1;return{s:function(){s=t[Symbol.iterator]()},n:function(){var t=s.next();return l=t.done,t},e:function(t){i=!0,n=t},f:function(){try{l||null==s.return||s.return()}finally{if(i)throw n}}}}function e(t,a){(null==a||a>t.length)&&(a=t.length);for(var e=0,s=new Array(a);e<a;e++)s[e]=t[e];return s}!function(){"use strict";function e(t,a){return Math.floor(Math.random()*(a-t+1))+t}window["moment-range"].extendMoment(moment),t('[data-toggle="tab"]').on("hide.bs.tab",(function(a){t(a.target).removeClass("active")})),Charts.init();var s=function(t){var a=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"line",e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{},s=arguments.length>3?arguments[3]:void 0;e=Chart.helpers.merge({elements:{line:{fill:"start",backgroundColor:settings.charts.colors.area,tension:0,borderWidth:1},point:{pointStyle:"circle",radius:5,hoverRadius:5,backgroundColor:settings.colors.white,borderColor:settings.colors.primary[700],borderWidth:2}},scales:{yAxes:[{display:!1}],xAxes:[{display:!1}]}},e),s=s||{labels:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],datasets:[{label:"Earnings",data:[400,200,450,460,220,380,800]}]},Charts.create(t,a,e,s)};t(".stats-chart").each((function(t,a){for(var s=a.getContext("2d"),r=[],o=6;o>=0;o--)r.push(e(100,300));new Chart(s,{type:"line",data:{labels:["01","02","03","04","05","06","07","08"],datasets:[{data:r,borderWidth:2,borderColor:settings.colors.primary[400],backgroundColor:settings.colors.primary[50],pointBackgroundColor:settings.colors.primary[400]}]},options:{elements:{point:{radius:0}},tooltips:{enabled:!1},legend:{display:!1,labels:{display:!1}},scales:{xAxes:[{gridLines:{display:!1},ticks:{display:!1}}],yAxes:[{gridLines:{display:!1},ticks:{display:!1}}]}}})})),function(t){var s=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"line",r=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};r=Chart.helpers.merge({title:{display:!0,fontSize:12,fontColor:"rgba(54, 76, 102, 0.54)",position:"top",text:"SALES OVER TIME"},legend:{display:!0,align:"start",labels:{usePointStyle:!1,padding:16,boxWidth:16}},elements:{line:{fill:"start",backgroundColor:settings.charts.colors.area}},scales:{yAxes:[{ticks:{stepSize:10,callback:function(t){return"$"+t}}}],xAxes:[{ticks:{padding:4,callback:function(t){return t}},gridLines:{display:!1},type:"time",time:{unit:"day",displayFormats:{day:"D/MM"},stepSize:2,maxTicksLimit:7,autoSkip:!1}}]},tooltips:{callbacks:{label:function(t,a){var e=a.datasets[t.datasetIndex].label||"",s=t.yLabel,r="";return 1<a.datasets.length&&(r+='<span class="popover-body-label mr-auto">'+e+"</span>"),r+'<span class="popover-body-value">$'+s+"</span>"}}}},r);var o,n=[],l=moment().subtract(6,"days").format("YYYY-MM-DD"),i=moment().format("YYYY-MM-DD"),d=moment.range(l,i),c=a(d.by("days"));try{for(c.s();!(o=c.n()).done;){var p=o.value;n.push({y:e(2,40),x:p.toDate()})}}catch(t){c.e(t)}finally{c.f()}n={datasets:[{label:"Total Sales",data:n}]};Charts.create(t,s,r,n)}("#totalSalesChart"),function(t){var s=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"roundedBar",r=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};r=Chart.helpers.merge({title:{display:!0,fontSize:12,fontColor:"rgba(54, 76, 102, 0.54)",position:"top",text:"VISITORS OVER TIME"},legend:{display:!0,align:"start",labels:{usePointStyle:!1,padding:16,boxWidth:16}},barRoundness:1.2,barThickness:8,scales:{yAxes:[{ticks:{callback:function(t){if(!(t%10))return t+"k"}}}],xAxes:[{ticks:{padding:4,callback:function(t){return t}},offset:!0,gridLines:{display:!1},type:"time",time:{unit:"day",displayFormats:{day:"D/MM"},stepSize:2,maxTicksLimit:7}}]},tooltips:{callbacks:{label:function(t,a){var e=a.datasets[t.datasetIndex].label||"",s=t.yLabel,r="";return 1<a.datasets.length&&(r+='<span class="popover-body-label mr-auto">'+e+"</span>"),r+'<span class="popover-body-value">'+s+"k</span>"}}}},r);var o,n=[],l=moment().subtract(6,"days").format("YYYY-MM-DD"),i=moment().format("YYYY-MM-DD"),d=moment.range(l,i),c=a(d.by("days"));try{for(c.s();!(o=c.n()).done;){var p=o.value;n.push({y:e(10,30),x:p.toDate()})}}catch(t){c.e(t)}finally{c.f()}n={datasets:[{label:"Total Visitors",data:n,barPercentage:.5,barThickness:20}]};Charts.create(t,s,r,n)}("#totalVisitorsChart"),function(t){var s=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"line",r=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};r=Chart.helpers.merge({elements:{line:{tension:0}},title:{display:!0,fontSize:12,fontColor:"rgba(54, 76, 102, 0.54)",position:"top",text:"CUSTOMERS"},legend:{display:!0,align:"start",labels:{usePointStyle:!1,padding:16,boxWidth:16}},scales:{yAxes:[{ticks:{autoSkip:!1,autoSkipPadding:0,padding:4,maxTicksLimit:4,callback:function(t){return t+"%"}}}],xAxes:[{ticks:{padding:4,callback:function(t){return t}},gridLines:{display:!1},type:"time",time:{unit:"day",displayFormats:{day:"D/MM"},stepSize:2,maxTicksLimit:7,autoSkip:!1}}]},tooltips:{callbacks:{label:function(t,a){var e=a.datasets[t.datasetIndex].label||"",s=t.yLabel,r="";return 1<a.datasets.length&&(r+='<span class="popover-body-label mr-auto">'+e+"</span>"),r+'<span class="popover-body-value">'+s+"%</span>"}}}},r);var o,n=[],l=[],i=moment().subtract(6,"days").format("YYYY-MM-DD"),d=moment().format("YYYY-MM-DD"),c=moment.range(i,d),p=a(c.by("days"));try{for(p.s();!(o=p.n()).done;){var u=o.value;n.push({y:e(0,5),x:u.toDate()}),l.push({y:e(5,10),x:u.toDate()})}}catch(t){p.e(t)}finally{p.f()}var b={datasets:[{label:"First time",data:n,borderWidth:2,borderColor:settings.colors.primary[400],backgroundColor:settings.colors.primary[400],pointBackgroundColor:settings.colors.primary[400]},{label:"Returning",data:l,borderWidth:2,borderColor:settings.colors.success[400],backgroundColor:settings.colors.success[400],pointBackgroundColor:settings.colors.success[400]}]};Charts.create(t,s,r,b)}("#repeatCustomerRateChart"),function(t){var s=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"line",r=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};r=Chart.helpers.merge({title:{display:!0,fontSize:12,fontColor:"rgba(54, 76, 102, 0.54)",position:"top",text:"ORDERS OVER TIME"},legend:{display:!0,align:"start",labels:{usePointStyle:!1,padding:16,boxWidth:16}},scales:{yAxes:[{ticks:{stepSize:1,callback:function(t){return t}}}],xAxes:[{ticks:{padding:4,callback:function(t){return t}},gridLines:{display:!1},type:"time",time:{unit:"day",displayFormats:{day:"D/MM"},stepSize:2,maxTicksLimit:7,autoSkip:!1}}]},tooltips:{callbacks:{label:function(t,a){var e=a.datasets[t.datasetIndex].label||"",s=t.yLabel,r="";return 1<a.datasets.length&&(r+='<span class="popover-body-label mr-auto">'+e+"</span>"),r+'<span class="popover-body-value">'+s+"</span>"}}}},r);var o,n=[],l=moment().subtract(6,"days").format("YYYY-MM-DD"),i=moment().format("YYYY-MM-DD"),d=moment.range(l,i),c=a(d.by("days"));try{for(c.s();!(o=c.n()).done;){var p=o.value;n.push({y:e(0,2),x:p.toDate()})}}catch(t){c.e(t)}finally{c.f()}n={datasets:[{label:"Total Orders",data:n}]};Charts.create(t,s,r,n)}("#totalOrdersChart"),function(t){var s=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"line",r=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};r=Chart.helpers.merge({title:{display:!0,fontSize:12,fontColor:"rgba(54, 76, 102, 0.54)",position:"top",text:"ORDER VALUE"},legend:{display:!0,align:"start",labels:{usePointStyle:!1,padding:16,boxWidth:16}},scales:{yAxes:[{ticks:{stepSize:10,callback:function(t){return"$"+t}}}],xAxes:[{ticks:{padding:4,callback:function(t){return t}},gridLines:{display:!1},type:"time",time:{unit:"day",displayFormats:{day:"D/MM"},stepSize:2,maxTicksLimit:7,autoSkip:!1}}]},tooltips:{callbacks:{label:function(t,a){var e=a.datasets[t.datasetIndex].label||"",s=t.yLabel,r="";return 1<a.datasets.length&&(r+='<span class="popover-body-label mr-auto">'+e+"</span>"),r+'<span class="popover-body-value">$'+s+"</span>"}}}},r);var o,n=[],l=moment().subtract(6,"days").format("YYYY-MM-DD"),i=moment().format("YYYY-MM-DD"),d=moment.range(l,i),c=a(d.by("days"));try{for(c.s();!(o=c.n()).done;){var p=o.value;n.push({y:e(0,50),x:p.toDate()})}}catch(t){c.e(t)}finally{c.f()}n={datasets:[{label:"Order Value",data:n}]};Charts.create(t,s,r,n)}("#averageOrderValueChart"),function(t){var a=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"doughnut",e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};e=Chart.helpers.merge({tooltips:{callbacks:{title:function(t,a){return a.labels[t[0].index]},label:function(t,a){return""+'<span class="popover-body-value">'+a.datasets[0].data[t.index]+" visits</span>"}}}},e);var s={labels:["Desktop","Mobile","Tablet"],datasets:[{data:[267,184,0],backgroundColor:[settings.colors.success[400],settings.colors.primary[500],settings.colors.gray[300]],hoverBorderColor:"dark"==settings.charts.colorScheme?settings.colors.gray[800]:settings.colors.white}]};Charts.create(t,a,e,s)}("#visitsByDeviceChart"),function(t){var a=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"roundedBar",e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};e=Chart.helpers.merge({barRoundness:1.2,scales:{yAxes:[{ticks:{callback:function(t){if(!(t%10))return t+"k"}}}]},tooltips:{callbacks:{label:function(t,a){var e=a.datasets[t.datasetIndex].label||"",s=t.yLabel,r="";return 1<a.datasets.length&&(r+='<span class="popover-body-label mr-auto">'+e+"</span>"),r+'<span class="popover-body-value">'+s+"k</span>"}}}},e);var s={labels:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],datasets:[{label:"Sales",data:[25,20,30,22,17,10,18,26,28,26,20,32],barPercentage:.5,barThickness:20}]};Charts.create(t,a,e,s)}("#trafficBarChart"),function(t){var a=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"line",e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};e=Chart.helpers.merge({elements:{line:{fill:"start",backgroundColor:settings.charts.colors.area}},scales:{yAxes:[{ticks:{callback:function(t){if(!(t%10))return"$"+t+"k"}}}]},tooltips:{callbacks:{label:function(t,a){var e=a.datasets[t.datasetIndex].label||"",s=t.yLabel,r="";return 1<a.datasets.length&&(r+='<span class="popover-body-label mr-auto">'+e+"</span>"),r+'<span class="popover-body-value">$'+s+"k</span>"}}}},e);var s={labels:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],datasets:[{label:"Traffic",data:[10,2,5,15,10,12,15,25,22,30,25,40]}]};Charts.create(t,a,e,s)}("#earningsTrafficChart"),function(t){var a=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"doughnut",e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};e=Chart.helpers.merge({tooltips:{callbacks:{title:function(t,a){return a.labels[t[0].index]},label:function(t,a){return""+'<span class="popover-body-value">'+a.datasets[0].data[t.index]+"%</span>"}}}},e);var s={labels:["United States","United Kingdom","Germany","India"],datasets:[{data:[25,25,15,35],backgroundColor:[settings.colors.success[400],settings.colors.danger[400],settings.colors.primary[500],settings.colors.gray[300]],hoverBorderColor:"dark"==settings.charts.colorScheme?settings.colors.gray[800]:settings.colors.white}]};Charts.create(t,a,e,s)}("#locationDoughnutChart"),s("#productsChart"),function(t){var a=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"line",e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};e=Chart.helpers.merge({elements:{line:{borderColor:settings.colors.success[700],backgroundColor:settings.hexToRGB(settings.colors.success[100],.5)},point:{borderColor:settings.colors.success[700]}}},e),s(t,a,e)}("#coursesChart")}()}).call(this,e("EVdn"))}},[[18,0,1]]]);