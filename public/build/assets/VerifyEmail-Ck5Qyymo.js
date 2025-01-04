import{T as m,K as f,d as a,C as g,i as s,f as i,u as e,Z as p,g as o,e as y,q as _,j as n,J as h,k as v,E as k}from"./app-D7Jmbt7w.js";import{G as x}from"./GuestLayout-Bb5IsOVG.js";import{_ as b}from"./PrimaryButton-DTIPntxk.js";import"./ApplicationLogo-B1oXeGrB.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const w=o("div",{class:"mb-4 text-sm text-gray-600"}," Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another. ",-1),V={key:0,class:"mb-4 font-medium text-sm text-green-600"},B={class:"mt-4 flex items-center justify-between"},T={__name:"VerifyEmail",props:{status:{type:String}},setup(r){const c=r,t=m({}),d=()=>{t.post(route("verification.send"))},u=f(()=>c.status==="verification-link-sent");return(l,E)=>(a(),g(x,null,{default:s(()=>[i(e(p),{title:"Email Verification"}),w,u.value?(a(),y("div",V," A new verification link has been sent to the email address you provided during registration. ")):_("",!0),o("form",{onSubmit:k(d,["prevent"])},[o("div",B,[i(b,{class:h({"opacity-25":e(t).processing}),disabled:e(t).processing},{default:s(()=>[n(" Resend Verification Email ")]),_:1},8,["class","disabled"]),i(e(v),{href:l.route("logout"),method:"post",as:"button",class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:s(()=>[n("Log Out")]),_:1},8,["href"])])],32)]),_:1}))}};export{T as default};
