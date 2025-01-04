import{T as f,o as h,d as i,e as n,f as a,u as t,Z as x,i as c,g as e,k as y,p as b,h as v,t as m,v as w,L as q,F as p,m as k,x as S}from"./app-D7Jmbt7w.js";import{_ as V}from"./AuthenticatedLayout-kfdYhZci.js";import{_ as u}from"./InputError-SRVMLVH8.js";import{E as C}from"./Editor-BD0f4ueL.js";import{_ as A}from"./_plugin-vue_export-helper-DlAUqK2U.js";import"./ApplicationLogo-B1oXeGrB.js";import"./Dropdown-BtlqRfQV.js";const r=l=>(b("data-v-a04a52ee"),l=l(),v(),l),F=r(()=>e("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"},"Add Frequently Ask Questions",-1)),B={class:"py-12"},E={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},I={class:"flex justify-start"},j=r(()=>e("i",{class:"fa-solid fa-arrow-left px-4"},null,-1)),M=r(()=>e("span",null,"Go Back",-1)),U={class:"bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col"},D={class:"w-full bg-white rounded-md p-4 shadow-md space-y-2"},L={class:"grid grid-cols-1 sm:grid-cols-2 gap-4"},N={class:"col-span-1"},Q=r(()=>e("label",{for:"form-name",class:"block text-lg font-medium text-gray-700"},"Question",-1)),T={class:"col-span-1"},$=r(()=>e("label",{for:"form-category",class:"block text-lg font-medium text-gray-700"},"Select Category",-1)),G=r(()=>e("option",{disabled:""},"Category",-1)),O=["value"],Z={class:"grid grid-cols-1 sm:grid-cols-1 gap-4"},z={class:"grid grid-cols-1 sm:grid-cols-2 gap-4"},H={class:"mt-5"},J=r(()=>e("label",{for:"form-description",class:"block text-lg font-medium text-gray-700"},"Answer",-1)),K={__name:"Create",props:{services:{type:Object,required:!0},categories:{type:Array,required:!0}},setup(l){const s=f({question:"",category_id:"",answer:""});function _(){s.post(route("admin.faqs.store"),{preserveScroll:!0,onSuccess:()=>{s.reset()}})}return h(()=>{s.clearErrors()}),(g,d)=>(i(),n(p,null,[a(t(x),{title:"Admin: Faqs"}),a(V,null,{header:c(()=>[F]),default:c(()=>[e("div",B,[e("div",E,[e("div",I,[a(t(y),{class:"bg-main-400 px-2 py-1 rounded-md text-white hover:bg-main-500 mb-2",href:g.route("admin.faqs.index")},{default:c(()=>[j,M]),_:1},8,["href"])]),e("div",U,[e("div",D,[e("div",L,[e("div",N,[Q,m(e("input",{id:"form-name",class:"w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent","onUpdate:modelValue":d[0]||(d[0]=o=>t(s).question=o),type:"text",required:""},null,512),[[w,t(s).question]]),a(u,{class:"mt-2",message:t(s).errors.question},null,8,["message"])]),e("div",T,[$,m(e("select",{id:"category",class:"w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent","onUpdate:modelValue":d[1]||(d[1]=o=>t(s).category_id=o)},[G,(i(!0),n(p,null,k(l.categories,o=>(i(),n("option",{key:o.id,value:o.id},S(o.name),9,O))),128))],512),[[q,t(s).category_id]]),a(u,{class:"mt-2",message:t(s).errors.category_id},null,8,["message"])])]),e("div",Z,[e("div",z,[e("div",H,[J,a(C,{modelValue:t(s).answer,"onUpdate:modelValue":d[2]||(d[2]=o=>t(s).answer=o)},null,8,["modelValue"]),a(u,{class:"mt-2",message:t(s).errors.answer},null,8,["message"])])]),e("div",{class:"flex justify-end mt-5"},[e("button",{type:"",class:"bg-green-500 px-3 py-1 text-white rounded-lg",onClick:_},"Submit")])])])])])])]),_:1})],64))}},te=A(K,[["__scopeId","data-v-a04a52ee"]]);export{te as default};
