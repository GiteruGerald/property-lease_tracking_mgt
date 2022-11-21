import { forEach } from "lodash";
import moment from "moment";

export default function useHelper() {

    
    const formatDate = (value) => {
        // if(value){
        return moment(value).format('LL')
        // }
    };
    const checkYears = (date, years) =>{

        let currDate =  new Date()
        let dateA = new Date(date);

        let dateB =  dateA.setFullYear(dateA.getFullYear() + years);   
            if(dateB <= currDate){
                return 'Expired'
            }else{
                return 'Active'
            }

        return dateA;
    };

    return{
        formatDate,
        checkYears
    }
}
