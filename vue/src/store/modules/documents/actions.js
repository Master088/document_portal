import {
  CREATE_FOLDER_ACTION,
  CREATE_FOLDER_MUTATION,
  GET_DOCUMENTS, SET_DOCUMENTS, SET_FILES, SET_FOLDERS, SET_PARENT_DATA
} from "../../store-constants";
import axiosClient from "../../../axios";

export default {
  
  async [GET_DOCUMENTS](context, payload) {
    /*Call axios get request */
    console.log("Call axios get request")
    let querytString="";

    
    if(payload.limit){
      querytString+="?limit="+payload.limit
    }

    if(payload.type){
      if(querytString){
        querytString+="&type="+payload.type
      }else{
        querytString+="?type="+payload.type
      }
    }

console.log("querytString",querytString)

axiosClient 
  .get(
    `/document/${payload.left}${querytString}`
  )
  .then(res => {
    console.log("document",res.data.data)
    if(payload?.type=="folder"){
      context.commit(SET_FOLDERS, res.data.data.document);
    }else if(payload?.type=="file"){
      context.commit(SET_FILES, res.data.data.document);
    }else{
      context.commit(SET_DOCUMENTS, res.data.data.document);
    }
    context.commit(SET_PARENT_DATA, res.data.data.parentData);

    return Promise.resolve(res.data.data.document)
  })
  .catch(err => {
    console.log(err)
    return Promise.reject(err)
  })
},
async [CREATE_FOLDER_ACTION](context, payload) {
  /*Call axios get request */

axiosClient 
.post(
  `/document/directory`,payload
)
.then(res => {
  context.commit(CREATE_FOLDER_MUTATION, res.data.data.document);
  return Promise.resolve()
})
.catch(err => {
  console.log(err)
  return Promise.reject(err)
})
},
};
