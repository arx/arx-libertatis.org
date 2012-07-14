
set(CMDLINE ${CMDLINE})

message("A ${CMDLINE}")

execute_process(COMMAND ${CMDLINE})
