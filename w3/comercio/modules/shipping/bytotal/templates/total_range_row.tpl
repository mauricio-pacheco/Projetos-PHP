
<div id="" class="TotalRanges">
	%%LNG_ByTotalRowStart%% %%GLOBAL_CurrencyTokenLeft%% <input type="text" name="shipping_bytotal[lower_%%GLOBAL_POS%%]" value="%%GLOBAL_LOWER_VAL%%" id="lower_%%GLOBAL_POS%%" class="Field50 TotalRange LowerRange"> %%GLOBAL_CurrencyTokenRight%%
	%%GLOBAL_TotalMeasurement%% %%LNG_ByTotalRowMiddle%% %%GLOBAL_CurrencyTokenLeft%% <input type="text" name="shipping_bytotal[upper_%%GLOBAL_POS%%]" value="%%GLOBAL_UPPER_VAL%%" id="upper_%%GLOBAL_POS%%" class="Field50 TotalRange UpperRange"> %%GLOBAL_CurrencyTokenRight%%
	%%GLOBAL_TotalMeasurement%% %%LNG_ByTotalRowEnd%%
	%%GLOBAL_CurrencyTokenLeft%% <input type="text" name="shipping_bytotal[cost_%%GLOBAL_POS%%]" value="%%GLOBAL_COST_VAL%%" id="cost_%%GLOBAL_POS%%" class="Field50 TotalRange RangeCost"> %%GLOBAL_CurrencyTokenRight%%
	<a href="#" onclick="AddTotalRange(this.parentNode); return false;" class="add">Add</a>
	<a href="#" onclick="RemoveTotalRange(this.parentNode); return false;" class="remove">Remove</a>
</div>
