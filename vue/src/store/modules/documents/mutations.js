import { CREATE_FOLDER_MUTATION, SET_DOCUMENTS, SET_FILES, SET_FOLDERS, SET_PARENT_DATA, SET_USER_DATA, SET_USER_TOKEN } from "../../store-constants";

export default {
  //  add other data
  [SET_DOCUMENTS](state, payload) {
    state.documents = payload;
  },

  [SET_FOLDERS](state, payload) {
    state.folders = payload;
  },

  [SET_FILES](state, payload) {
    state.files = payload;
  },

  [CREATE_FOLDER_MUTATION](state, payload) {
    state.folders =[payload,...state.folders] ;
    state.documents =[payload,...state.documents] ;
  },

  [SET_PARENT_DATA](state, payload) {
    state.parentData = payload;
  },
 
};
