import { endpoints } from "../constants";
import { getRequest, postRequest, putRequest } from "../helpers/axios";

export const customerServices = {

    resetPassword: async (payload) => {
        const result = await postRequest(endpoints.resetPassword, payload);
        return result;
    },

    resetPasswordIndex: async(id, params) => {
        const result = await getRequest(`${endpoints.resetPassword}/${id}`, params);
        return result;
    },

    sendResetPassword: async(id) => {
        const result = await postRequest(`${endpoints.resetPassword}/${id}/send-sms`, null);
        return result;
    },

    updateCoreInfo: async (id, payload) => {
        const result = await putRequest(`${endpoints.updateCoreInfo}/${id}`, payload);
        return result;
    },

    updateEmployeeInfo: async (id, payload) => {
        const result = await putRequest(`${endpoints.updateEmployeeInfo}/${id}`, payload);
        return result;
    },

    updateAgentInfo: async (id, payload) => {
        const result = await putRequest(`${endpoints.updateAgentInfo}/${id}`, payload);
        return result;
    }
}