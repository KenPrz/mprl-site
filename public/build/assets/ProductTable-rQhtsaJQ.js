import{E as C,G as b,b as u,c as p,e,f as i,F as _,h as x,t as r,d as h,w as m,u as D,i as k,p as M,l as v}from"./app-CnlmfPpy.js";import{_ as P}from"./Modal-BmvHWvkA.js";import{_ as S}from"./_plugin-vue_export-helper-DlAUqK2U.js";const a=l=>(M("data-v-198743aa"),l=l(),v(),l),B={class:"styled-table"},N=a(()=>e("i",{class:"pi pi-sort"},null,-1)),$=a(()=>e("i",{class:"pi pi-sort"},null,-1)),I=a(()=>e("th",null," Price ",-1)),T=a(()=>e("i",{class:"pi pi-sort"},null,-1)),A=a(()=>e("th",null," Action ",-1)),E={class:"flex items-center space-x-2"},F=a(()=>e("i",{class:"fa-solid fa-pen"},null,-1)),V=["onClick"],O=a(()=>e("i",{class:"pi pi-trash"},null,-1)),j=[O],q={class:"flex flex-col items-center space-y-4 p-8 bg-gray-100 rounded-lg shadow-md"},G=a(()=>e("h1",{class:"text-2xl font-semibold text-center text-red-400"},"Delete Product",-1)),L={class:"text-center"},U={class:"font-semibold"},W={class:"flex space-x-4"},y=C(),Y={data(){return{showDeleteModal:!1,selected:{name:null,id:null}}},methods:{openDeleteModal(l,n){this.selected.name=l,this.selected.id=n,this.showDeleteModal=!0},deleteProduct(l){this.$inertia.delete(route("admin.products.destroy",l),{onSuccess:()=>{y.success("Product deleted successfully!"),this.selected.name=null,this.selected.id=null,this.showDeleteModal=!1},onError:()=>{y.error("Failed to delete product!"),this.selected.name=null,this.selected.id=null,this.showDeleteModal=!1}})}}},z=Object.assign(Y,{__name:"ProductTable",props:{products:{type:Array,required:!0}},setup(l){const n=l,d=b({id:"asc",name:"asc",category_name:"asc",price:"asc",is_displayed:"asc"});function f(){c("name"),n.products.sort((t,s)=>d.name==="asc"?t.name.localeCompare(s.name):s.name.localeCompare(t.name))}function g(){c("is_displayed"),n.products.sort((t,s)=>d.is_displayed==="asc"?t.is_displayed-s.is_displayed:s.is_displayed-t.is_displayed)}function w(){c("category_name"),n.products.sort((t,s)=>d.category_name==="asc"?t.category_name.localeCompare(s.category_name):s.category_name.localeCompare(t.category_name))}function c(t){d[t]=d[t]==="asc"?"desc":"asc"}return(t,s)=>(u(),p(_,null,[e("table",B,[e("thead",null,[e("tr",null,[e("th",null,[e("button",{onClick:f},[i(" Name "),N])]),e("th",null,[e("button",{onClick:w},[i(" Category "),$])]),I,e("th",null,[e("button",{onClick:g},[i(" Displayed "),T])]),A])]),e("tbody",null,[(u(!0),p(_,null,x(n.products,o=>(u(),p("tr",{key:o.id},[e("td",null,r(o.name),1),e("td",null,r(o.category_name),1),e("td",null,r(o.price),1),e("td",null,r(o.is_displayed?"Yes":"No"),1),e("td",null,[e("span",E,[h(D(k),{href:t.route("admin.products.edit",o.id),class:"text-green-500"},{default:m(()=>[F]),_:2},1032,["href"]),e("button",{onClick:H=>t.openDeleteModal(o.name,o.id),class:"text-red-500"},j,8,V)])])]))),128))])]),h(P,{maxWidth:"md",show:t.showDeleteModal,"onUpdate:show":s[2]||(s[2]=o=>t.showDeleteModal=o),onClose:s[3]||(s[3]=o=>t.showDeleteModal=!1)},{default:m(()=>[e("div",q,[G,e("p",L,[i("Are you sure you want to delete "),e("span",U,'"'+r(t.selected.name)+'"',1),i("?")]),e("div",W,[e("button",{onClick:s[0]||(s[0]=o=>t.showDeleteModal=!1),class:"bg-gray-400 text-white px-4 py-2 rounded-lg"},"Cancel"),e("button",{onClick:s[1]||(s[1]=o=>t.deleteProduct(t.selected.id)),class:"bg-red-400 text-white px-4 py-2 rounded-lg"},"Delete")])])]),_:1},8,["show"])],64))}}),R=S(z,[["__scopeId","data-v-198743aa"]]);export{R as default};
