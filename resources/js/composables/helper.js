import moment from "moment";

export function formatDate(value){
    if(value){
        return moment(value).format('LL')
    }
}
