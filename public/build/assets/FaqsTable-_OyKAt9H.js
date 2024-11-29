import{t as f,d as r,e as u,g as e,p as m,i as w,k as n,F as c,q as b,y as d,f as p,j as h,u as y,l as g}from"./app-Bggvsate.js";import{_ as x}from"./Modal-BcHlt9L-.js";import{_ as D}from"./_plugin-vue_export-helper-DlAUqK2U.js";const a=s=>(m("data-v-50d05297"),s=s(),w(),s),q={class:"styled-table"},M=a(()=>e("thead",null,[e("tr",null,[e("th",null,[e("button",null,[n(" ID "),e("i",{class:"pi pi-sort"})])]),e("th",null,[e("button",null,[n(" Question "),e("i",{class:"pi pi-sort"})])]),e("th",null,[e("button",null,[n(" Category "),e("i",{class:"pi pi-sort"})])]),e("th",null,[e("button",null,[n(" Answer "),e("i",{class:"pi pi-sort"})])]),e("th",null," Action ")])],-1)),k={class:"flex items-center space-x-2"},v=a(()=>e("i",{class:"fa-solid fa-pen"},null,-1)),C=["onClick"],F=a(()=>e("i",{class:"pi pi-trash"},null,-1)),$=[F],j={class:"flex flex-col items-center space-y-4 p-8 bg-gray-100 rounded-lg shadow-md"},I=a(()=>e("h1",{class:"text-2xl font-semibold text-center text-red-400"},"Delete Project",-1)),S={class:"text-center"},A={class:"font-semibold"},T={class:"flex space-x-4"},_=f(),B={data(){return{showDeleteModal:!1,selected:{question:null,id:null}}},methods:{openDeleteModal(s,i){this.selected.question=s,this.selected.id=i,this.showDeleteModal=!0},deleteProject(s){this.$inertia.delete(route("admin.faqs.destroy",s),{onSuccess:()=>{_.success("Faq deleted successfully!"),this.selected.question=null,this.selected.id=null,this.showDeleteModal=!1},onError:()=>{_.error("Failed to delete Faq!"),this.selected.question=null,this.selected.id=null,this.showDeleteModal=!1}})}}},N=Object.assign(B,{__name:"FaqsTable",props:{faqs:{type:Array,required:!0}},setup(s){const i=s;return(l,o)=>(r(),u(c,null,[e("table",q,[M,e("tbody",null,[(r(!0),u(c,null,b(i.faqs,t=>(r(),u("tr",{key:t.id},[e("td",null,d(t.id),1),e("td",null,d(t.question),1),e("td",null,d(t.category_id),1),e("td",null,d(t.answer),1),e("td",null,[e("span",k,[p(y(g),{href:l.route("admin.faqs.edit",t.id),class:"text-green-500"},{default:h(()=>[v]),_:2},1032,["href"]),e("button",{onClick:P=>l.openDeleteModal(t.question,t.id),class:"text-red-500"},$,8,C)])])]))),128))])]),p(x,{maxWidth:"md",show:l.showDeleteModal,"onUpdate:show":o[2]||(o[2]=t=>l.showDeleteModal=t),onClose:o[3]||(o[3]=t=>l.showDeleteModal=!1)},{default:h(()=>[e("div",j,[I,e("p",S,[n("Are you sure you want to delete "),e("span",A,'"'+d(l.selected.question)+'"',1),n("?")]),e("div",T,[e("button",{onClick:o[0]||(o[0]=t=>l.showDeleteModal=!1),class:"bg-gray-400 text-white px-4 py-2 rounded-lg"},"Cancel"),e("button",{onClick:o[1]||(o[1]=t=>l.deleteProject(l.selected.id)),class:"bg-red-400 text-white px-4 py-2 rounded-lg"},"Delete")])])]),_:1},8,["show"])],64))}}),O=D(N,[["__scopeId","data-v-50d05297"]]);export{O as default};
