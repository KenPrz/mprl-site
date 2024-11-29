import{r as d,o as M,c as A,K as P,d as c,e as n,f as l,u as v,Z as B,g as e,h as I,p as L,i as O,j as f,k as S,l as _,F as h,q as k,y as x,v as C,L as T,m as U,x as j}from"./app-Bggvsate.js";import{N as D,_ as F}from"./Footer-BTFo_7w_.js";import $ from"./ProductCard-B2LsyIls.js";import z from"./ProductFilter-BRSBOJcx.js";import{_ as R}from"./_plugin-vue_export-helper-DlAUqK2U.js";import"./ApplicationLogo-CGKtPefA.js";import"./Modal-BcHlt9L-.js";import"./Dropdown-Zr03yGGL.js";import"./Login-BFCI3N7C.js";import"./InputError-DKCkpr5B.js";import"./PrimaryButton-DRhsvJdk.js";import"./TextInput-Bfc144Cj.js";import"./Register-CVyeBFjf.js";import"./InputLabel-BJZAPJWC.js";const u=r=>(L("data-v-70e7acf9"),r=r(),O(),r),W={class:"relative py-44 bg-cover bg-center h-auto",style:{"background-image":"url('/images/blog-header-bg.png')"}},q={class:"absolute inset-0 bg-blue-500 bg-opacity-70 flex flex-col justify-center items-center text-center"},G={class:"flex flex-col items-center justify-center space-y-6"},H=u(()=>e("h2",{class:"text-4xl md:text-5xl font-semibold text-white"},"Products",-1)),K={class:"text-md md:text-lg tracking-wide space-x-4 flex text-white"},Q=u(()=>e("span",{class:"mx-2"},"/",-1)),Y={class:"flex flex-col lg:ml-20 mt-10"},Z={class:"grid grid-cols-1 gap-4 p-4 lg:flex lg:gap-0 lg:items-start lg:mr-20"},J={class:"lg:flex lg:items-center lg:w-2/5"},X={class:"border-blue-600 grid grid-cols-1 sm:flex lg:flex-col lg:items-start lg:ml-0 lg:border-0"},ee=u(()=>e("div",{class:"ml-10 text-xl font-medium text-blue-600 lg:ml-0 lg:border-blue-600 lg:border-l-4"},[e("p",{class:"ml-5 font-bold hidden lg:block"},"CATEGORIES")],-1)),te={class:"mt-2 sm:mt-0 lg:mt-2 w-full"},se=u(()=>e("div",{class:"relative ml-8 mt-10 hidden sm:block shadow-lg","data-aos":"fade-right"},[e("img",{src:"images/products-images/contact.png",class:"w-full h-auto",alt:"Product Image"}),e("div",{class:"absolute inset-0 flex items-end justify-start mb-2 pl-3"},[e("p",{class:"text-white text-sm bg-green-500 p-2 rounded-lg"},"CONTACT US")])],-1)),oe={class:"mt-10 hidden sm:block"},le=u(()=>e("div",{class:"ml-10 text-xl font-medium text-blue-600 lg:ml-0 border-blue-600 border-l-4"},[e("p",{class:"ml-5 font-bold"},"NEW PRODUCTS")],-1)),ae={class:""},re=["href"],ie={class:"flex gap-5 p-2 pl-3"},de=["src"],ce={class:"ml-3 font-bold"},ne={class:"ml-3 text-sm flex mt-1"},ue={class:"lg:w-3/4"},me={class:"flex flex-col sm:flex-row sm:justify-between"},pe={class:"sm:mr-4 mb-4 sm:mb-1"},ve=U('<option value="all" selected data-v-70e7acf9>Sort By</option><option value="name" data-v-70e7acf9>Name</option><option value="power" data-v-70e7acf9>Power Out</option><option value="voltage" data-v-70e7acf9>Voltage</option><option value="voltage" data-v-70e7acf9>Supplier</option>',5),ge=[ve],fe={class:"relative w-full sm:w-auto mt-2"},_e={class:"border-t-4 p-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:flex-1"},he={__name:"Main",props:{initialProducts:Array,categories:Array,products:Array,newproducts:Array},setup(r){const m=d(0),a=d([]),b=d([]),i=d("all"),p=d(""),w=r,y=()=>{m.value=Math.round(window.scrollY)};M(()=>{window.addEventListener("scroll",y)}),A(()=>{window.removeEventListener("scroll",y)});function N(t){a.value=t}a.value=w.initialProducts,b.value=w.categories;const g=P(()=>i.value==="name"?[...a.value].sort((t,o)=>t.name.localeCompare(o.name)):i.value==="power"?[...a.value].sort((t,o)=>t.power_out-o.power_out):i.value==="voltage"?[...a.value].sort((t,o)=>t.voltage-o.voltage):i.value==="supplier"?[...a.value].sort((t,o)=>t.supplier.localeCompare(o.supplier)):a.value),V=P(()=>p.value?g.value.filter(t=>t.name.toLowerCase().includes(p.value.toLowerCase())):g.value);function E(){g.value}return(t,o)=>(c(),n(h,null,[l(v(B),{title:"Product"}),e("nav",{class:I([{"bg-white shadow-md fixed":m.value>1,"bg-none text-white absolute bg-black bg-opacity-10":m.value===0},"flex flex-col top-0 w-full bg-none z-50 h-30 transition-all duration-500 ease-in-out"])},[l(D,{is_black:m.value>0},null,8,["is_black"])],2),e("section",null,[e("div",W,[e("div",q,[e("div",G,[H,e("div",K,[l(v(_),{class:"hover:underline",href:t.route("welcome")},{default:f(()=>[S("HOME")]),_:1},8,["href"]),Q,l(v(_),{class:"hover:underline",href:t.route("products")},{default:f(()=>[S("Product")]),_:1},8,["href"])])])])])]),e("main",null,[e("div",Y,[e("div",Z,[e("div",J,[e("div",X,[ee,e("div",te,[l(z,{categories:b.value,onUpdateProducts:N},null,8,["categories"])]),l(v(_),{href:t.route("contact.index")},{default:f(()=>[se]),_:1},8,["href"]),e("div",null,[e("div",oe,[le,(c(!0),n(h,null,k(r.newproducts,s=>(c(),n("div",{class:"mt-3 border rounded-lg w-3/4 hover:scale-105 transition-transform duration-300 hover:shadow-md",key:s.id,"data-aos":"fade-right"},[e("div",ae,[e("a",{href:`/product/${s.id}`},[e("div",ie,[e("img",{class:"w-1/4",alt:"",src:s.first_image?`/storage/${s.first_image.images}`:"/images/products-images/solarpanel.png"},null,8,de),e("div",null,[e("p",ce,x(s.name),1),e("p",ne,x(s.power_out)+"Watts|"+x(s.voltage)+"Volts",1)])])],8,re)])]))),128))])])])]),e("div",ue,[e("div",me,[e("div",pe,[C(e("select",{name:"sortBy",id:"",class:"mt-2 ml-4 sm:ml-0 px-3 py-1 border rounded-2xl","onUpdate:modelValue":o[0]||(o[0]=s=>i.value=s),onChange:E},ge,544),[[T,i.value]])]),e("div",fe,[C(e("input",{type:"text","onUpdate:modelValue":o[1]||(o[1]=s=>p.value=s),class:"border rounded-2xl px-3 py-1 m-1 sm:m-0 w-full sm:w-auto",placeholder:"Search Product"},null,512),[[j,p.value]])])]),e("div",_e,[(c(!0),n(h,null,k(V.value,s=>(c(),n("div",{key:s.id,class:"w-full"},[l($,{"data-aos":"fade-left","data-aos-delay":"20",product:s},null,8,["product"])]))),128))])])])])]),l(F)],64))}},Ie=R(he,[["__scopeId","data-v-70e7acf9"]]);export{Ie as default};
